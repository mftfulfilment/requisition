<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequisitionMail2 extends Mailable
{
    public $data, $url_1, $url_2;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$url_1, $url_2)
    {
        $this->data = $data;
        $this->url_1 = $url_1;
        $this->url_2 = $url_2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.mail2')
                    ->to('godwins.juma@speedballcourier.com')
                    ->from('mft.portal@gmail.com', $this->data['name'])
                    ->subject('Requisition');
    }
}
