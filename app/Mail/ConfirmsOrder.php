<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmsOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $image;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($image)
    {
        set_time_limit(8000000);
        $this->image = $image;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirm_orders');
    }
}
