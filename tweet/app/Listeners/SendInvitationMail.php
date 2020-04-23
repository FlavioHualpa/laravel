<?php

namespace App\Listeners;

use App\Events\Invitation;
use App\Mail\InvitationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendInvitationMail
{
   /**
   * Create the event listener.
   *
   * @return void
   */
   public function __construct()
   {
      //
   }
   
   /**
   * Handle the event.
   *
   * @param  Invitation  $event
   * @return void
   */
   public function handle(Invitation $event)
   {
      $mail = new InvitationMail(
         $event->invited,
         $event->inviter,
      );

      \Mail::to($event->invited)->send($mail);
   }
}
