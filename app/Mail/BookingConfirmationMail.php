<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $reference;

    public function __construct(Booking $booking, string $reference)
    {
        $this->booking   = $booking;
        $this->reference = $reference;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Your Safari Booking Confirmed! – ' . $this->reference)
                    ->view('emails.confirmation');

    }
}
