<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Invitation
{
   use Dispatchable, InteractsWithSockets, SerializesModels;
   
   public $invited, $inviter;

   /**
   * Create a new event instance.
   *
   * @return void
   */
   public function __construct(User $invited, User $inviter)
   {
      $this->invited = $invited;
      $this->inviter = $inviter;
   }
   
   /**
   * Get the channels the event should broadcast on.
   *
   * @return \Illuminate\Broadcasting\Channel|array
   */
   public function broadcastOn()
   {
      return new PrivateChannel('channel-name');
   }
}
