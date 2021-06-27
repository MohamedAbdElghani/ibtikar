<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInviteMailToFriends extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email)
    {
      $this->name = $name;
      $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->markdown('email.send-invite-mail-to-friends')
      ->subject($this->name.' invited you to Ibtikar Talent portal!')
      ->with([
        'name' => $this->name,
        'email' => $this->email,
      ]);
    }
}
