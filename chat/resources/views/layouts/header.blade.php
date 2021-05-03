   <header class="flex justify-center items-center px-20 bg-green-100">

      <div class="px-6 py-4 border-green-{{request()->route()->uri == '/' ? '600' : '100'}} border-b-2 hover:bg-green-200 transition duration-200">
         <a href="{{route('home')}}">CANALES</a>
      </div>
      <div class="px-6 py-4 border-green-{{request()->route()->uri == 'chat' ? '600' : '100'}} border-b-2 hover:bg-green-200 transition duration-200">
         <a href="{{route('chat')}}">CHAT</a>
      </div>
      <div class="px-6 py-4 border-green-100 border-b-2 hover:bg-green-200 transition duration-200">
         <form action="{{ route('logout') }}" method="post" id="logoutForm">
            @csrf
            <button type="submit" onclick="event.preventDefault(); document.querySelector('#logoutForm').submit();">
               SALIR
            </button>
         </form>
      </div>
      <div class="px-6 py-4 border-green-100 border-b-2 hover:bg-green-200 transition duration-200 cursor-pointer">
         <i class="fas fa-user-circle"></i>
         <a>{{ Auth::user()->name }}</a>
      </div>

   </header>
