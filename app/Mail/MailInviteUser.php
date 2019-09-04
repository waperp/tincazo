<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailInviteUser extends Mailable
{
    use Queueable, SerializesModels;
    protected $user_inviter;
    protected $user_invited;
    protected $group;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_inviter,$user_invited,$group)
    {
        $this->user_inviter = $user_inviter;
        $this->user_invited = $user_invited;
        $this->group = $group;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('INVITACION A UNIRSE A UN GRUPO EN TINCAZO.COM')
        ->from('tincazo.info@gmail.com')
        ->markdown('emails.mailInviteUser')
        ->with([
            'user_inviter' => $this->user_inviter,
            'user_invited' => $this->user_invited,
            'group' =>  $this->group,
        ]);

    }
}
