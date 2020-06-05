@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>Bienvenido!</h5>
                    <h5>Sesiones activas:</h5>

                    @foreach (config('auth.guards') as $guardName => $guardOptions)
                        
                        @if (($guard = Auth::guard($guardName))->check())
                            <h4 class="font-weight-bold">
                                {{ $guard->user()->fullName }},
                                <span class="font-weight-normal">
                                    perfil:
                                    {{ get_class($guard->user()) }}
                                </span>
                            </h4>
                        @endif
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
