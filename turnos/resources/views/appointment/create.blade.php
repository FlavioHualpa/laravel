@extends('layout.basic')

@section('content')
   <main class="container mt-4 mx-auto bg-gray-100 rounded border border-gray-300 p-6">
      <h1 class="text-2xl">
         Solicitud de nuevo turno
      </h1>
      <div class="mt-4">
         <label for="medicalCenter" class="block text-sm @error('medicalCenter') text-red-600 @enderror">Centro Médico</label>
         <select name="medicalCenter" id="medicalCenter" class="mt-1 py-1 px-2 border rounded focus:ring @error('medicalCenter') border-red-300 text-red-600 focus:ring-red-200 @else border-gray-300 focus:ring-blue-200 @enderror transition duration-200 outline-none">
            @foreach ($medicalCenters as $mc)
               <option value="{{ $mc->id }}">
                  {{ $mc->name }}
               </option>
            @endforeach
         </select>
      </div>
      <p class="text-green-300 underline text-center"></p>
      <input type="button" class="shadow rounded border-0">
   </main>
@endsection