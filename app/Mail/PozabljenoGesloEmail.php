<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PozabljenoGesloEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $uporabnik;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($uporabnik)
    {
        $this->uporabnik = $uporabnik;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'patronazna.sluzba.tpo@gmail.com';
        $name = 'Patronažna služba';
        $subject = 'Aktivacijska koda';
        return $this->view('emails.pozabljenogeslo')
                ->from($address, $name)
                ->cc($address, $name)
                ->bcc($address, $name)
                ->replyTo($address, $name)
                ->subject($subject);
    }
}
