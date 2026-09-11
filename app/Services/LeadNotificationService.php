<?php

namespace App\Services;

use App\Mail\ClientNewLeadNotificationMail;
use App\Mail\UserLeadAcknowledgementMail;
use App\Models\ContactEnquiry;
use App\Models\EmailLog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class LeadNotificationService
{
    /**
     * Dispatch fail-safe notifications to both the customer and the client business.
     * Guaranteed never to throw an unhandled exception or abort the transaction.
     *
     * @param ContactEnquiry $enquiry
     * @return array Status breakdown of both deliveries
     */
    public function sendLeadNotifications(ContactEnquiry $enquiry): array
    {
        $results = [
            'user_email' => [
                'attempted' => false,
                'sent' => false,
                'error' => null,
            ],
            'client_email' => [
                'attempted' => false,
                'sent' => false,
                'error' => null,
            ],
        ];

        // 1. Send Customer Confirmation Email (if user provided email)
        if (!empty($enquiry->email) && filter_var($enquiry->email, FILTER_VALIDATE_EMAIL)) {
            $results['user_email']['attempted'] = true;
            $userMail = new UserLeadAcknowledgementMail($enquiry);
            $subject = "Thank You for Your Enquiry — " . ($enquiry->project ?: 'RRR Prekshitha Enclave') . " (Ref: {$enquiry->lead_number})";

            try {
                Mail::to($enquiry->email)->send($userMail);

                EmailLog::create([
                    'contact_enquiry_id' => $enquiry->id,
                    'mail_type' => 'user_acknowledgement',
                    'recipient_email' => $enquiry->email,
                    'subject' => $subject,
                    'status' => 'sent',
                    'error_message' => null,
                    'metadata' => [
                        'lead_number' => $enquiry->lead_number,
                        'sent_at' => now()->toIso8601String(),
                    ],
                ]);

                $results['user_email']['sent'] = true;
            } catch (Throwable $e) {
                Log::error("LeadNotificationService: User acknowledgement mail failed for Lead #{$enquiry->lead_number} ({$enquiry->email}): " . $e->getMessage(), [
                    'exception' => $e,
                    'lead_id' => $enquiry->id,
                ]);

                EmailLog::create([
                    'contact_enquiry_id' => $enquiry->id,
                    'mail_type' => 'user_acknowledgement',
                    'recipient_email' => $enquiry->email,
                    'subject' => $subject,
                    'status' => 'failed',
                    'error_message' => $this->sanitizeErrorMessage($e->getMessage()),
                    'metadata' => [
                        'lead_number' => $enquiry->lead_number,
                        'failed_at' => now()->toIso8601String(),
                    ],
                ]);

                $results['user_email']['error'] = $e->getMessage();
            }
        }

        // 2. Send Client Business Notification Email
        $clientEmail = config('mail.client_notification_email') ?: env('CLIENT_NOTIFICATION_EMAIL', 'info@navagruha.com');

        if (!empty($clientEmail) && filter_var($clientEmail, FILTER_VALIDATE_EMAIL)) {
            $results['client_email']['attempted'] = true;
            $clientMail = new ClientNewLeadNotificationMail($enquiry);
            $clientSubject = "[New Website Lead] {$enquiry->lead_number} — {$enquiry->name} (" . ($enquiry->project ?: 'RRR Prekshitha Enclave') . ")";

            try {
                Mail::to($clientEmail)->send($clientMail);

                EmailLog::create([
                    'contact_enquiry_id' => $enquiry->id,
                    'mail_type' => 'client_notification',
                    'recipient_email' => $clientEmail,
                    'subject' => $clientSubject,
                    'status' => 'sent',
                    'error_message' => null,
                    'metadata' => [
                        'lead_number' => $enquiry->lead_number,
                        'sent_at' => now()->toIso8601String(),
                    ],
                ]);

                $results['client_email']['sent'] = true;
            } catch (Throwable $e) {
                Log::error("LeadNotificationService: Client alert mail failed for Lead #{$enquiry->lead_number}: " . $e->getMessage(), [
                    'exception' => $e,
                    'lead_id' => $enquiry->id,
                ]);

                EmailLog::create([
                    'contact_enquiry_id' => $enquiry->id,
                    'mail_type' => 'client_notification',
                    'recipient_email' => $clientEmail,
                    'subject' => $clientSubject,
                    'status' => 'failed',
                    'error_message' => $this->sanitizeErrorMessage($e->getMessage()),
                    'metadata' => [
                        'lead_number' => $enquiry->lead_number,
                        'failed_at' => now()->toIso8601String(),
                    ],
                ]);

                $results['client_email']['error'] = $e->getMessage();
            }
        }

        return $results;
    }

    /**
     * Remove sensitive credentials (like passwords, auth tokens) from error strings before logging.
     */
    protected function sanitizeErrorMessage(string $message): string
    {
        // Redact any password-like strings or app passwords
        $sanitized = preg_replace('/password=[^&;]+/i', 'password=[REDACTED]', $message);
        $sanitized = preg_replace('/AUTH\s+[A-Za-z0-9+\/=]+/i', 'AUTH [REDACTED]', $sanitized);

        return substr($sanitized, 0, 1000);
    }
}
