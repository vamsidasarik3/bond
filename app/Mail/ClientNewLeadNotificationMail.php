<?php

namespace App\Mail;

use App\Models\ContactEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClientNewLeadNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public ContactEnquiry $enquiry;
    public string $adminLeadUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(ContactEnquiry $enquiry)
    {
        $this->enquiry = $enquiry;
        // Generate absolute URL for the admin to view lead details
        $this->adminLeadUrl = url("/admin/enquiries/{$enquiry->id}");
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $project = $this->enquiry->project ?: 'RRR Prekshitha Enclave';
        $leadNum = $this->enquiry->lead_number ?: '#' . $this->enquiry->id;
        $name = $this->enquiry->name;

        return new Envelope(
            subject: "[New Website Lead] {$leadNum} — {$name} ({$project})",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.client-new-lead-notification',
            with: [
                'enquiry' => $this->enquiry,
                'adminLeadUrl' => $this->adminLeadUrl,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
