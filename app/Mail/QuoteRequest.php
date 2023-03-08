<?php

namespace App\Mail;

use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuoteRequest extends Mailable
{
    use Queueable, SerializesModels;
    public $quote;
    public $package;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Quote $quote, $package)
    {
        $this->quote = $quote;
        $this->package = $package;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        // return $this->markdown('email.booking-request')
        // ->subject('New Booking Request Received');
        return $this
        ->from($address = $this->quote->email, $name = $this->quote->full_name)
        ->subject('Inquiry for '.$this->package->package_name)
        ->markdown('email.quote-request');

    }
}
