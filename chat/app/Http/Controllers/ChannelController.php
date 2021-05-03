<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;

class ChannelController extends Controller
{
   public function index()
   {
      return view('index')
         ->with(['channels' => Channel::orderBy('name')->get()]);
   }
}
