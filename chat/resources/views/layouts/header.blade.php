   <header class="flex justify-between items-center px-20 py-4">
      {{-- Sección izquierda --}}
      <img src="{{ asset('img/EquizLogo.jpg') }}" alt="Equiz" class="w-32">

      {{-- Sección media --}}
      <div class="text-3xl text-teal-600 font-weight-700">BIENVENIDO</div>

      {{-- Sección derecha --}}
      <div>
         @guest
            <a href="{{ route('login') }}" class="bg-teal-500 hover:bg-teal-400 text-white px-4 py-3 rounded-md transition duration-200">
               Iniciar Sesión
            </a>
         @else
            <div class="flex items-center">
               <img
                  src="{{ auth()->user()->profile_photo_url }}"
                  alt="{{ auth()->user()->name }}"
                  class="rounded-full w-8 mr-1 shadow-sm"
               >
               <span class="text-lg">
                  {{ auth()->user()->name }}
               </span>
               
               <form action="{{ route('logout') }}" method="post" id="logoutForm" class="ml-6 mb-0">
                  @csrf
                  <button type="submit" class="bg-red-500 hover:bg-red-400 text-white px-5 py-2 rounded-md transition duration-200 focus:outline-none" onclick="event.preventDefault(); document.querySelector('#logoutForm').submit();">
                     Cerrar Sesión
                  </button>
               </form>
            </div>
         @endguest
      </div>
   </header>
