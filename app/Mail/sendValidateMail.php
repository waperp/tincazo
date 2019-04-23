<?php

namespace App\Mail;
use App\secpin;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendValidateMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $data;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(secpin $data)
    {
       $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
  

     public function build()
    {
        return $this->from('soporte@tincazo.com')->subject('REESTABLECER TU CONTRASEÑA')
        ->markdown('emails.sendValidateMail');

    }
}
