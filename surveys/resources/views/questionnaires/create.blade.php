@extends('..\layouts.app')

@section('content')

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <h5 class="card-header">Nuevo Cuestionario</h5>
            
            <div class="card-body">
               <form action="{{ route('qnr.store') }}" method="POST">
                  @csrf
                  <div class="form-group">
                     <label for="name">Nombre</label>
                     <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Nombre del cuestionario" value="{{ old('name') }}">
                     <small id="nameHelp" class="form-text text-muted">Un nombre simple que describa el cuestionario</small>
                     
                     @error('name')
                     <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Crear</button>
               </form>
            </div>
            
         </div>
      </div>
   </div>
</div>

@endsection
