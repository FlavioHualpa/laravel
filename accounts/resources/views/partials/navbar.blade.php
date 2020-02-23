<nav class="navbar">
   <div>
      <span class="brand-start">Factu</span><span class="brand-end">Net</span>
   </div>
   <div>
      <span class="avatar" style="{{ auth()->user()->avatar_css }}"></span>

      <span class="menu-item">
         {{ auth()->user()->name }}
         @if (auth()->user() instanceOf App\Account)
            (administrador)
         @endif
      </span>

      @if (auth()->user() instanceof App\User && session('active_company'))
      <span class="menu-item drop-down-item">
         {{ session('active_company')->name }}

         <div class="drop-down-menu">
            @foreach (auth()->user()->account->companies as $company)
            <span class="menu-item stackable" data-index="{{ $loop->index }}" onclick="switchCompany()">
               {{ $company->name }}
            </span>
            @endforeach
         </div>

         <form action="{{ route('switch.company') }}" method="post" id="switch-company" style="display: none;">
            @csrf
            <input type="hidden" name="company-index" id="id-field">
         </form>
      </span>
      @endif

      <span class="menu-item" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">
         <i class="fas fa-power-off"></i>
         Cerrar Sesión
      </span>
   </div>
   <form action="{{ route('logout') }}" method="post" style="display: none;" id="logout-form">
      @csrf
   </form>
</nav>

@push('scripts')
   <script>
      function switchCompany()
      {
         var form = document.querySelector('#switch-company');
         var id_field = form.querySelector('#id-field');
         var index = event.target.getAttribute('data-index');

         id_field.setAttribute('value', index);
         form.submit();
      }
   </script>
@endpush