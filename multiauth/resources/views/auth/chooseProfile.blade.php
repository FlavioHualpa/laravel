@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('Login') }}</div>
            
            <div class="card-body">

               <h5>
                  Seleccione el perfil para iniciar sesión como
                  {{ request('email') }}
               </h5>

               <form method="POST" action="{{ route('loginWithProfile') }}">
                  @csrf
                  
                  <div class="form-group row mt-3">

                     <div class="col-md-6 offset-md-1">

                        @foreach ($profiles as $profile)
                        
                           <div class="form-check">

                              <input
                                 class="form-check-input"
                                 type="radio"
                                 name="profile"
                                 value="{{get_class($profile)}}"
                                 id="profile[{{$loop->index}}]"
                                 {{ old('profile') ? 'checked' : '' }}
                              >
                              
                              <label
                                 class="form-check-label"
                                 for="profile[{{$loop->index}}]"
                              >
                                 {{ get_class($profile) }}
                              </label>

                           </div>

                        @endforeach

                        @error('profile')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror

                     </div>
                  
                  </div>

                  <input type="hidden" name="email" value="{{ request('email') }}">
                  <input type="hidden" name="password" value="{{ request('password') }}">
                  
                  <div class="form-group row mb-0">
                     <div class="col-md-8 offset-md-1">
                        <button type="submit" class="btn btn-primary">
                           {{ __('Login') }}
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
