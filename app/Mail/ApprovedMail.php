<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $status, $reason;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($status, $reason)
    {
        $this->status = $status;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails/approved')->subject('Requisition');
    }
}
