<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriberRequest extends Mailable
{
    use Queueable, SerializesModels;
    public $subscriber;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
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
        return $this->markdown('email.subscriber-request')
        ->subject('New subscriber Request Received');

    }
}
