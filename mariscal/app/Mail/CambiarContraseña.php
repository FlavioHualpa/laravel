<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CambiarContraseña extends Mailable
{
   use Queueable, SerializesModels;

   public $user;
   public $token;
   public $link;
   
   /**
   * Create a new message instance.
   *
   * @return void
   */
   public function __construct($user, $token)
   {
      $this->user = $user;
      $this->token = $token;
      $this->link = "/password/reset/$token?cuit=$user->cuit";
   }
   
   /**
   * Build the message.
   *
   * @return $this
   */
   public function build()
   {
      return $this->view('emails.cambiar-contraseña');
   }
}
