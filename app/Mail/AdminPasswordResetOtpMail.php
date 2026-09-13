<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminPasswordResetOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $otp;
    public User $user;
    public string $ipAddress;
    public string $requestedAt;
    public int $expiresInMinutes;

    /**
     * Create a new message instance.
     */
    public function __construct(string $otp, User $user, string $ipAddress, int $expiresInMinutes = 10)
    {
        $this->otp = $otp;
        $this->user = $user;
        $this->ipAddress = $ipAddress;
        $this->expiresInMinutes = $expiresInMinutes;
        $this->requestedAt = now()->format('d M Y, h:i A');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "[Navagruha Security] {$this->otp} is your Admin Password Verification Code",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-password-otp',
            with: [
                'otp' => $this->otp,
                'user' => $this->user,
                'ipAddress' => $this->ipAddress,
                'requestedAt' => $this->requestedAt,
                'expiresInMinutes' => $this->expiresInMinutes,
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
