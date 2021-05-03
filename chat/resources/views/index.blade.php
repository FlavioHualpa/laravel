@extends('layouts.app')

@section('header')
   @include('layouts.header')
@endsection

@section('content')
   <div class="w-96 mt-6 mx-auto p-8 bg-white rounded shadow">
      <h1 class="text-2xl text-center mb-6">
         Bienvenido a la sala de chat
      </h1>
      <h3 class="text-lg text-center mb-6">
         Seleccioná un canal
      </h1>

      <form action="{{route('chat')}}">
         <select name="channel" id="channel" size="8" class="mx-auto block p-3 overflow-y-auto outline-none border border-gray-300 rounded focus:ring-2 ring-green-300 transition duration-200">
            @foreach ($channels as $channel)
               <option value="{{$channel->id}}" class="text-lg py-1 px-4">
                  {{$channel->name}}
               </option>
            @endforeach
         </select>

         @if (session('status') == 'no channel selected')
            <div class="mt-6 py-3 text-center text-red-600 bg-red-100 border border-red-300 rounded">
               Por favor seleccioná un canal
            </div>
         @endif

         <button type="submit" class="block mt-6 mx-auto px-6 py-2 rounded-md text-white bg-green-600 hover:bg-green-500 transition duration-200 focus:outline-none focus:ring-2 ring-green-300">
            Ingresar al canal
         </button>
      </form>

   </div>
@endsection