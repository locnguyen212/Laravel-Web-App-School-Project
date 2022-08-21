<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApproveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $Mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Mail)
    {
        $this->Mail = $Mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail From Origami')->view('emails.ApproveMail');
    }
}
