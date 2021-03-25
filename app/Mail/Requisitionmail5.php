<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Requisitionmail5 extends Mailable
{ public $data;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.mail5')
                    ->to($this->data['RequisitionerEmail'])
                    ->from('mft.portal@gmail.com', 'Mft Portal')
                    ->subject('Agent Requisition Confirmation');
    }
}
