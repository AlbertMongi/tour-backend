<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewBookingAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $reference;

    public function __construct(Booking $booking, string $reference)
    {
        $this->booking   = $booking;
        $this->reference = $reference;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Booking Received – ' . $this->reference,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.new-booking-admin',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
