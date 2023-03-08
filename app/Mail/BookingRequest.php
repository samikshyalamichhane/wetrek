<?php

namespace App\Mail;

use App\Models\BookingForm;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingRequest extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BookingForm $booking,$package)
    {
        $this->booking = $booking;
        $this->package = $package;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from($address = $this->booking->email, $name = $this->booking->first_name.$this->booking->last_name)
        ->subject('Booking for '.$this->package->package_name)
        ->markdown('email.booking-request');
        // return $this->markdown('email.booking-request')
        // ->subject('New Booking Request Received');
    }
}
