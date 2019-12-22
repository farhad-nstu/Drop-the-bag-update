<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PartnerSubscription extends Mailable
{
    use Queueable, SerializesModels;
    public $userEmail, $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userEmail, $password)
    {
        $this->userEmail = $userEmail;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.partner-subscription-info');
    }
}
