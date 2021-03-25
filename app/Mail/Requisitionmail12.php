<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Requisitionmail12 extends Mailable
{
    use Queueable, SerializesModels;
    public $data, $url_1, $url_3;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$url_1, $url_3)
    {
        //
        
        $this->data = $data;
        $this->url_1 = $url_1;
        $this->url_3 = $url_3;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.mail7')
                    ->to('customerservice.gh@mftfulfillmentcenter.com')
                    ->from('mft.portal@gmail.com', $this->data['name'])
                    ->subject('Requisition');
    }   
}
