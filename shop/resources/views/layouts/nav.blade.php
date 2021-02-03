<header>
   <nav class="container mx-auto px-6 flex justify-between items-center bg-lime-400 shadow">
      <div>
         <a href="{{ url('home') }}">
            <img
               src="{{ asset('img/site/shopping-cart.png') }}"
               alt="Shop"
               class="w-24"
            >
         </a>
      </div>

      <div>
         @auth
            <ul class="flex items-center">
               <li class="inline-block px-2">
                  <img
                     src="{{ auth()->user()->avatar }}"
                     alt="{{ auth()->user()->first_name }}"
                     class="w-12 rounded-full border border-gray-600"
                  >
               </li>
               <li class="inline-block py-1 px-2">
                  <a href="{{ route('user.profile') }}"
                     class="hover:underline hover:text-gray-500"
                  >
                     {{ auth()->user()->first_name }}
                  </a>
               </li>
               <li class="inline-block py-1 px-2">
                  <form action="{{ route('logout') }}" method="post" id="logout">
                     @csrf
                     <a href="#" onclick="event.preventDefault(); document.querySelector('#logout').submit();" class="text-white hover:underline hover:text-gray-500">
                        Cerrar Sesión
                     </a>
                  </form>
               </li>
               <li class="inline-block py-1 px-2">
                  <livewire:cart />
               </li>
            </ul>
         @else
            <ul>
               <li class="inline-block py-1 px-2">
                  <a href="{{ route('login') }}" class="text-white hover:underline hover:text-gray-500">
                     Iniciar Sesión
                  </a>
               </li>
               <li class="inline-block py-1 px-2">
                  <a href="{{ route('register') }}" class="text-white hover:underline hover:text-gray-500">
                     Registrame
                  </a>
               </li>
            </ul>
         @endauth
      </div>
   </nav>
</header>