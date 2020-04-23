<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable
{
   use Queueable, SerializesModels;

   protected $invited, $inviter;
   
   /**
   * Create a new message instance.
   *
   * @return void
   */
   public function __construct(User $invited, User $inviter)
   {
      $this->invited = $invited;
      $this->inviter = $inviter;
   }
   
   /**
   * Build the message.
   *
   * @return $this
   */
   public function build()
   {
      return $this->view('mails.invitation', [
         'invited_name' => \Str::words($this->invited->name, 1, ''),
         'inviter' => $this->inviter,
      ]);
   }
}
