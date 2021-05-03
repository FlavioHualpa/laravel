@extends('layouts.app')

@section('header')
   @include('layouts.header')
@endsection

@section('content')
   <div class="w-1/3 mt-6 mx-auto p-8 bg-white rounded shadow">
      <h1 class="text-xl text-center mb-6">
         {{ Auth::user()->name }},
         estás en el canal
         {{ $channel->name }}
      </h1>

      <div class="p-2 bg-gray-200 border border-gray-400 rounded">
         <div class="h-96 p-2 bg-white border border-gray-300 rounded flex flex-col justify-end overflow-y-scroll" id="messagesList">
            @foreach ($messages as $message)
            <div class="border-t border-gray-300 p-3">
               <div class="flex justify-between">
                  <p class="text-green-400 text-sm font-bold">
                     {{ $message->user->name }}
                  </p>
                  <p class="text-green-400 text-xs">
                     {{ $message->created_at->format('d/m/Y H:i') }}
                  </p>
               </div>
               <p class="text-gray-600">
                  {{ $message->content }}
               </p>
            </div>
            @endforeach
         </div>
         <div class="p-2 flex">
            <input type="text" class="p-2 border border-gray-400 border-r-0 rounded-l rounded-r-none flex-grow outline-none" placeholder="Escribí tu mensaje aquí" name="message" id="message">
            <a href="#" class="p-2 bg-green-600 text-white rounded-r hover:bg-green-500 focus:ring focus:ring-green-300 transition duration-200" id="sendButton" onclick="sendMessage()">Enviar</a>
         </div>
      </div>
   </div>
@endsection

@push('scripts')
   <script src="{{asset('js/app.js')}}"></script>
   <script src="{{asset('js/chat.js')}}"></script>
@endpush