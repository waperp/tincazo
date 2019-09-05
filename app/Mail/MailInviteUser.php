<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class MailInviteUser extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    protected $user_inviter;
    protected $user_invited;
    protected $group;
    protected $plainftname;
    protected $secusrtmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($plainftname,$secusrtmail,$user_invited,$group)
    {
        $this->secusrtmail = $secusrtmail;
        $this->plainftname = $plainftname;
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
            'plainftname' => $this->plainftname,
            'secusrtmail' => $this->secusrtmail,
            'user_invited' => $this->user_invited,
            'group' =>  $this->group,
        ]);

    }
}
