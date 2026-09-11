<?php

namespace App\Mail;

use App\Models\ContactEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserLeadAcknowledgementMail extends Mailable
{
    use Queueable, SerializesModels;

    public ContactEnquiry $enquiry;

    /**
     * Create a new message instance.
     */
    public function __construct(ContactEnquiry $enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $projectName = $this->enquiry->project ?: 'RRR Prekshitha Enclave';

        return new Envelope(
            subject: "Thank You for Your Enquiry — {$projectName} (Ref: {$this->enquiry->lead_number})",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.user-lead-acknowledgement',
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
