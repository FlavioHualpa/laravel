<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\Message;
use App\Events\MessageSent;

class MessageController extends Controller
{
   public function index()
   {
      $channelId = request()->query('channel');

      if ($channelId == null)
         return redirect()
            ->route('home')
            ->with(['status' => 'no channel selected']);
      
      return view('chat')
         ->with([
            'channel' => Channel::findOrFail($channelId),
            'messages' => Message::where('channel_id', $channelId)->get()
         ]);
   }

   public function sendMessage(Request $request)
   {
      $user = Auth::user();
      $channel = Channel::findOrFail($request->channel);

      $message = Message::create([
         'user_id' => $user->id,
         'channel_id' => $channel->id,
         'content' => $request->message
      ]);

      broadcast(new MessageSent($user, $channel, $message))
         ->toOthers();
      
      return [ $user, $message ];
   }
}
