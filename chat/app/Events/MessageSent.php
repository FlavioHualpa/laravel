<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Channel as MessageChannel;
use App\Models\Message;
use App\Models\User;

class MessageSent implements ShouldBroadcast
{
   use Dispatchable, InteractsWithSockets, SerializesModels;
   
   /**
   * User that sent the message.
   *
   * @var User
   */
   public $user;

   /**
   * The message sent by the user.
   *
   * @var Message
   */
   public $message;

   /**
   * The channel the message is intended to belong to.
   *
   * @var Channel
   */
   public $channel;

   /**
   * Create a new event instance.
   *
   * @return void
   */
   public function __construct(User $user, MessageChannel $channel, Message $message)
   {
      $this->user = $user;
      $this->channel = $channel;
      $this->message = $message;
   }
   
   /**
   * Get the channels the event should broadcast on.
   *
   * @return \Illuminate\Broadcasting\Channel|array
   */
   public function broadcastOn()
   {
      return new PrivateChannel('chat');
   }
}
