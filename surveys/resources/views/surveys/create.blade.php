@extends('..\layouts.app')

@section('content')

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">
               <h5 class="font-weight-bold">{{ $questionnaire->name }}</h5>
               <h6>ENCUESTA</h6>
            </div>
         </div>
         
         <form action="{{ $questionnaire->surveyUrl() }}" method="post">
            @csrf
            
            @foreach ($questionnaire->questions as $question)
            <div class="card mt-4" id="question-{{ $question->id }}-card">

               <div class="card-header">
                  <p class="font-weight-bold mb-0">
                     {{ $loop->iteration }}. {{ $question->question }}
                  </p>
               </div>

               <div class="card-body">
                  @foreach ($question->choices as $choice)
                  <div class="form-group mb-0">
                     <input type="radio" name="responses[{{ $question->id }}][choice_id]" value="{{ $choice->id }}" class="mr-2" id="choice.{{ $choice->id }}" style="transform: scale(1.2);" {{ old('responses.' . $question->id . '.choice_id') == $choice->id ? 'checked' : '' }}>

                     <label for="choice.{{ $choice->id }}" style="width: 90%; font-size: 1rem;">
                        {{ $choice->choice }}
                     </label>

                     <input type="hidden" name="responses[{{ $question->id }}][marker]" value="hola">
                  </div>
                  @endforeach

                  @error('responses.' . $question->id . '.choice_id')
                  <p class="text-danger mb-0">{{ $message }}</p>
                  @enderror
               </div>

            </div>
            @endforeach

            <div class="card mt-4">

               <div class="card-header">
                  <p class="font-weight-bold mb-0">
                     Dinos quién eres
                  </p>
               </div>

               <div class="card-body">
                  <div class="form-group mb-2">
                     <label for="name" class="mb-0">Tu nombre</label>
                     <input type="text" name="taker[taker_name]" id="name" value="{{ old('taker.taker_name') }}" class="form-control">

                     @error('taker.taker_name')
                     <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>

                  <div class="form-group mb-2">
                     <label for="email" class="mb-0">Tu email</label>
                     <input type="email" name="taker[taker_email]" id="email" value="{{ old('taker.taker_email') }}" class="form-control">

                     @error('taker.taker_email')
                     <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>

                  <div class="form-group mb-0">
                     <button type="submit" class="btn btn-primary">
                        Enviar la encuesta
                     </button>
                  </div>
               </div>

            </div>
         </form>
               
      </div>
   </div>
</div>

@endsection
