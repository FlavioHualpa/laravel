@extends('..\layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <h5 class="card-header">Usuarios Registrados</h5>
            
            <div class="card-body">
               @foreach ($users as $user)
                  <p class="list-user">
                     <i class="fas fa-user-tie"></i>
                     <a href="{{ route('admin.user.data', [ 'user' => $user->id ]) }}">
                        {{ $user->name }}
                     </a>
                  </p>
               @endforeach
            </div>
            
         </div>
      </div>
   </div>
</div>

@endsection
