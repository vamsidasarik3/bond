<?php

namespace Tests\Feature;

use App\Mail\ClientNewLeadNotificationMail;
use App\Mail\UserLeadAcknowledgementMail;
use App\Models\ContactEnquiry;
use App\Models\EmailLog;
use App\Models\EnquiryNote;
use App\Models\User;
use App\Services\LeadNotificationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class LeadSystemAuditTest extends TestCase
{
    /**
     * Test 1: Website Form & Server-side Validation Rejections
     */
    public function test_backend_validation_rejects_invalid_submissions_and_creates_no_leads(): void
    {
        $initialCount = ContactEnquiry::count();

        // A. Missing Name
        $res = $this->postJson('/api/enquiries', [
            'email' => 'rahul@example.com',
            'phone' => '9876543210',
        ]);
        $res->assertStatus(422)->assertJsonValidationErrors(['name']);

        // B. Missing Email
        $res = $this->postJson('/api/enquiries', [
            'name' => 'Rahul Sharma',
            'phone' => '9876543210',
        ]);
        $res->assertStatus(422)->assertJsonValidationErrors(['email']);

        // C. Invalid Email Format
        $res = $this->postJson('/api/enquiries', [
            'name' => 'Rahul Sharma',
            'email' => 'invalid-email-format',
            'phone' => '9876543210',
        ]);
        $res->assertStatus(422)->assertJsonValidationErrors(['email']);

        // D. Missing Phone
        $res = $this->postJson('/api/enquiries', [
            'name' => 'Rahul Sharma',
            'email' => 'rahul@example.com',
        ]);
        $res->assertStatus(422)->assertJsonValidationErrors(['phone']);

        // E. Invalid Phone Pattern
        $res = $this->postJson('/api/enquiries', [
            'name' => 'Rahul Sharma',
            'email' => 'rahul@example.com',
            'phone' => 'abc123',
        ]);
        $res->assertStatus(422)->assertJsonValidationErrors(['phone']);

        // F. Past Preferred Date
        $res = $this->postJson('/api/enquiries', [
            'name' => 'Rahul Sharma',
            'email' => 'rahul@example.com',
            'phone' => '9876543210',
            'preferred_visit_date' => '2020-01-01',
        ]);
        $res->assertStatus(422)->assertJsonValidationErrors(['preferred_visit_date']);

        // Confirm 0 leads were created from any of these invalid attempts
        $this->assertEquals($initialCount, ContactEnquiry::count());
    }

    /**
     * Test 2: Database Record Creation, Unique Lead Number, Nullable Date & Defaults
     */
    public function test_valid_submission_creates_exactly_one_lead_with_unique_number_and_defaults(): void
    {
        Mail::fake();

        $beforeCount = ContactEnquiry::count();

        $response = $this->postJson('/api/enquiries', [
            'name' => 'Aditya Varma',
            'email' => 'aditya@example.com',
            'phone' => '9876501234',
            'preferred_visit_date' => null, // Optional field left empty
            'project' => 'RRR Prekshitha Enclave',
            'landing_page' => '/',
            'source' => 'Landing page',
            'utm_source' => 'google_ads',
            'utm_campaign' => 'aiims_plots',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ])
            ->assertJsonStructure([
                'success',
                'lead_number',
                'message',
                'enquiry_id',
            ]);

        $this->assertEquals($beforeCount + 1, ContactEnquiry::count());

        $lead = ContactEnquiry::latest('id')->first();
        $this->assertNotNull($lead);
        $this->assertMatchesRegularExpression('/^LEAD-\d{5}$/', $lead->lead_number);
        $this->assertEquals('Aditya Varma', $lead->name);
        $this->assertEquals('aditya@example.com', $lead->email);
        $this->assertEquals('9876501234', $lead->phone);
        $this->assertNull($lead->preferred_visit_date);
        $this->assertEquals('RRR Prekshitha Enclave', $lead->project);
        $this->assertEquals('/', $lead->landing_page);
        $this->assertEquals('Landing page', $lead->source);
        $this->assertEquals('google_ads', $lead->utm_source);
        $this->assertEquals('aiims_plots', $lead->utm_campaign);
        $this->assertEquals('new', $lead->status);
        $this->assertNotNull($lead->created_at);
        $this->assertNotNull($lead->updated_at);
    }

    /**
     * Test 3: Submission with Preferred Date Correctly Stored
     */
    public function test_submission_with_preferred_date_is_persisted_correctly(): void
    {
        Mail::fake();

        $futureDate = now()->addDays(5)->format('Y-m-d');

        $response = $this->postJson('/api/enquiries', [
            'name' => 'Sneha Reddy',
            'email' => 'sneha@example.com',
            'phone' => '9123456780',
            'preferred_visit_date' => $futureDate,
        ]);

        $response->assertStatus(200)->assertJson(['success' => true]);

        $lead = ContactEnquiry::latest('id')->first();
        $this->assertEquals('Sneha Reddy', $lead->name);
        $this->assertEquals($futureDate, $lead->preferred_visit_date->format('Y-m-d'));
    }

    /**
     * Test 4: Anti-Spam Honeypot Drops Submissions Silently
     */
    public function test_honeypot_silently_drops_spam_submission_without_creating_record(): void
    {
        $beforeCount = ContactEnquiry::count();

        $response = $this->postJson('/api/enquiries', [
            'name' => 'Spam Bot',
            'email' => 'bot@spammer.org',
            'phone' => '1234567890',
            'website_hp' => 'http://spam-link.com', // Honeypot filled
        ]);

        $response->assertStatus(200)->assertJson(['success' => true]);
        $this->assertEquals($beforeCount, ContactEnquiry::count());
    }

    /**
     * Test 5: User Acknowledgement Email Template & Phrasing
     */
    public function test_user_email_has_proper_content_and_omits_empty_date(): void
    {
        // Case A: With Date
        $leadWithDate = new ContactEnquiry([
            'lead_number' => 'LEAD-00099',
            'name' => 'Kavita Rao',
            'email' => 'kavita@example.com',
            'phone' => '9848012345',
            'preferred_visit_date' => now()->addDays(3)->toDateString(),
            'project' => 'RRR Prekshitha Enclave',
        ]);

        $mailA = new UserLeadAcknowledgementMail($leadWithDate);
        $renderedA = $mailA->render();

        $this->assertStringContainsString('Kavita Rao', $renderedA);
        $this->assertStringContainsString('LEAD-00099', $renderedA);
        $this->assertStringContainsString('Requested Visit Date', $renderedA);
        $this->assertStringContainsString('call you shortly on', $renderedA);
        $this->assertStringNotContainsString('null', $renderedA);
        $this->assertStringNotContainsString('undefined', $renderedA);

        // Case B: Without Date (preferred_visit_date is NULL)
        $leadWithoutDate = new ContactEnquiry([
            'lead_number' => 'LEAD-00100',
            'name' => 'Vikram Seth',
            'email' => 'vikram@example.com',
            'phone' => '9848054321',
            'preferred_visit_date' => null,
            'project' => 'RRR Prekshitha Enclave',
        ]);

        $mailB = new UserLeadAcknowledgementMail($leadWithoutDate);
        $renderedB = $mailB->render();

        $this->assertStringContainsString('Vikram Seth', $renderedB);
        $this->assertStringContainsString('LEAD-00100', $renderedB);
        // The table row for requested visit date should be completely omitted
        $this->assertStringNotContainsString('Requested Visit Date', $renderedB);
        // No false confirmation
        $this->assertStringContainsString('call you shortly on', $renderedB);
        $this->assertStringNotContainsString('null', $renderedB);
        $this->assertStringNotContainsString('undefined', $renderedB);
    }

    /**
     * Test 6: Client Alert Email Structure & Admin URL
     */
    public function test_client_notification_email_structure_and_admin_link(): void
    {
        $lead = new ContactEnquiry([
            'lead_number' => 'LEAD-00088',
            'name' => 'Mahesh Babu',
            'email' => 'mahesh@example.com',
            'phone' => '9617699699',
            'project' => 'RRR Prekshitha Enclave',
            'landing_page' => '/landing2/',
            'source' => 'Landing Page 2',
            'utm_source' => 'facebook_lead_ad',
        ]);
        $lead->id = 88;

        $clientMail = new ClientNewLeadNotificationMail($lead);
        $rendered = $clientMail->render();

        $this->assertStringContainsString('New Website Lead Received', $rendered);
        $this->assertStringContainsString('LEAD-00088', $rendered);
        $this->assertStringContainsString('Mahesh Babu', $rendered);
        $this->assertStringContainsString('9617699699', $rendered);
        $this->assertStringContainsString('mahesh@example.com', $rendered);
        $this->assertStringContainsString('RRR Prekshitha Enclave', $rendered);
        $this->assertStringContainsString('Landing page', $rendered);
        $this->assertStringContainsString('facebook_lead_ad', $rendered);
        $this->assertStringContainsString('/admin/enquiries/88', $rendered);
    }

    /**
     * Test 7: Fail-Safe Failure Handling (Saved Lead Is Never Lost on Email Failure)
     */
    public function test_lead_is_preserved_even_when_mail_sending_fails(): void
    {
        // Mock Mail to throw an exception
        Mail::shouldReceive('to->send')->andThrow(new \Exception('Simulated SMTP Connection Timeout / Auth Failure'));

        $initialLeadCount = ContactEnquiry::count();
        $initialLogCount = EmailLog::count();

        // Submit enquiry
        $response = $this->postJson('/api/enquiries', [
            'name' => 'Pooja Hegde',
            'email' => 'pooja@example.com',
            'phone' => '9888877777',
            'project' => 'RRR Prekshitha Enclave',
        ]);

        // 1. HTTP response must still succeed with 200
        $response->assertStatus(200)->assertJson(['success' => true]);

        // 2. Lead record MUST exist in database
        $this->assertEquals($initialLeadCount + 1, ContactEnquiry::count());
        $lead = ContactEnquiry::latest('id')->first();
        $this->assertEquals('Pooja Hegde', $lead->name);

        // 3. EmailLog table must capture the failure without crashing
        $this->assertGreaterThan($initialLogCount, EmailLog::count());
        $failedLog = EmailLog::where('contact_enquiry_id', $lead->id)->where('status', 'failed')->first();
        $this->assertNotNull($failedLog);
        $this->assertStringContainsString('Simulated SMTP', $failedLog->error_message);
    }

    /**
     * Test 8: Admin Security — Unauthorized Access Blocked
     */
    public function test_unauthorized_guests_cannot_access_admin_leads(): void
    {
        // 1. Leads index
        $res = $this->get('/admin/enquiries');
        $res->assertStatus(302)->assertRedirect('/login');

        // 2. Lead detail
        $res = $this->get('/admin/enquiries/1');
        $res->assertStatus(302)->assertRedirect('/login');

        // 3. Lead status update
        $res = $this->put('/admin/enquiries/1', ['status' => 'contacted']);
        $res->assertStatus(302)->assertRedirect('/login');

        // 4. Notes post
        $res = $this->post('/admin/enquiries/1/notes', ['note' => 'Unauthorized']);
        $res->assertStatus(302)->assertRedirect('/login');
    }

    /**
     * Test 9: Admin Authorized User Access, Status Updates & Notes
     */
    public function test_authorized_admin_can_manage_leads_and_notes(): void
    {
        $admin = User::first() ?: User::factory()->create();

        $lead = ContactEnquiry::create([
            'name' => 'Sanjay Verma',
            'email' => 'sanjay@example.com',
            'phone' => '9555544444',
            'status' => 'new',
        ]);

        // 1. Access Index as Admin
        $res = $this->actingAs($admin)->get('/admin/enquiries');
        $res->assertStatus(200);

        // 2. Search by Lead Number
        $res = $this->actingAs($admin)->get('/admin/enquiries?search=' . $lead->lead_number);
        $res->assertStatus(200)->assertSee($lead->lead_number);

        // 3. Access Show View
        $res = $this->actingAs($admin)->get('/admin/enquiries/' . $lead->id);
        $res->assertStatus(200)->assertSee($lead->lead_number);

        // 4. Update Status to 'site_visit_scheduled'
        $res = $this->actingAs($admin)->put('/admin/enquiries/' . $lead->id, [
            'status' => 'site_visit_scheduled',
            'admin_notes' => 'Customer requested cab pickup on Sunday morning.',
        ]);
        $res->assertStatus(302);
        $this->assertEquals('site_visit_scheduled', $lead->fresh()->status);
        $this->assertEquals('Customer requested cab pickup on Sunday morning.', $lead->fresh()->admin_notes);

        // 5. Post Chronological Internal Note
        $res = $this->actingAs($admin)->post('/admin/enquiries/' . $lead->id . '/notes', [
            'note' => 'Called customer. Scheduled visit for 11:00 AM this Sunday with cab.',
        ]);
        $res->assertStatus(302);

        $note = EnquiryNote::where('contact_enquiry_id', $lead->id)->latest()->first();
        $this->assertNotNull($note);
        $this->assertEquals('Called customer. Scheduled visit for 11:00 AM this Sunday with cab.', $note->note);
    }
}
