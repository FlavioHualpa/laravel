@extends('..\layouts.app')

@section('content')

<template id="create-qstn-tplt">
            <form action="{{ route('question.store') }}" method="post" id="form-new-qstn">
               @csrf
               <input type="hidden" name="questionnaire-id" value="{{ $questionnaire->id }}">

               <div class="card mt-4" id="temp-question-card">

                  <div class="card-header">
                     <label for="question" class="font-weight-bold mb-0">
                        Nueva pregunta
                     </label>
                     <input type="text" name="question[question]" class="form-control mb-2" id="question">
                     <p class="text-danger" style="display: none">Debes completar este campo</p>

                     <button class="btn btn-sm btn-primary" id="btn-add">
                        Agrega una respuesta
                     </button>
                     <button type="submit" class="btn btn-sm btn-success" id="btn-save">
                        Guarda la pregunta
                     </button>
                     <button class="btn btn-sm btn-danger" id="btn-cancel">
                        Cancelar
                     </button>
                  </div>

                  <div class="card-body" id="choices-card">
                     <ul class="mb-0">
                        <li class="mb-2">
                           <label for="choice.0" class="font-weight-bold mb-0">
                              Respuesta 1
                           </label>
                           <input type="text" name="choices[][choice]" class="form-control" id="choice.0">
                           <p class="text-danger" style="display: none">Debes completar este campo</p>
                        </li>
                        <li class="mb-2">
                           <label for="choice.1" class="font-weight-bold mb-0">
                              Respuesta 2
                           </label>
                           <input type="text" name="choices[][choice]" class="form-control" id="choice.1">
                           <p class="text-danger" style="display: none">Debes completar este campo</p>
                        </li>
                     </ul>
                  </div>

               </div>
            </form>
</template>

<template id="create-choice-tplt">
                     <li class="mb-2">
                        <label for="choice.0" class="font-weight-bold mb-0">
                           Respuesta
                        </label>
                        <input type="text" name="choices[][choice]" class="form-control" id="choice.0">
                        <p class="text-danger" style="display: none">Debes completar este campo</p>
                     </li>
</template>

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8" id="questionnaire-body" data-id="{{ $questionnaire->id }}">
         <div class="card" id="questionnaire-card" data-questions="{{ $questionnaire->questions->count() }}">
            <div class="card-header">
               <h5>{{ $questionnaire->name }}</h5>
               <h6 class="mb-1">Creado el {{ $questionnaire->created_at->format('d-m-Y \a \l\a\s H:i') }} por {{ auth()->user()->name }}</h6>
               <h6 class="mb-1">Preguntas: {{ $questionnaire->questions->count() }}</h6>
            </div>
            
            <div class="card-body">
               <a href="#" class="btn btn-primary" id="btn-new-qstn">
                  Agrega una pregunta
               </a>
            </div>
         </div>
         
         @foreach ($questionnaire->questions as $question)
            <div class="card mt-4" id="question-{{ $question->id }}-card">

               <div class="card-header d-flex justify-content-between align-items-center">
                  <p class="font-weight-bold mb-0">
                     {{ $loop->iteration }}. {{ $question->question }}
                  </p>

                  <form action="{{ route('question.delete') }}" method="post">
                     @csrf
                     @method('delete')

                     <input type="hidden" name="question_id" value="{{ $question->id }}">

                     <button type="submit" class="btn btn-sm btn-outline-danger">
                        Eliminar pregunta
                     </button>
                  </form>
               </div>

               <div class="card-body">
                  <ul class="mb-0">
                     @foreach ($question->choices as $choice)
                     <li class="mb-2 d-flex justify-content-between">
                        
                        <div>
                           {{ $choice->choice }}
                        </div>

                        @if ($questionnaire->surveys()->count() > 0)
                           @php
                           $percent = 100 * $choice->surveyResponses()->count() / $questionnaire->surveys()->count();
                           @endphp
                           <div>
                              {{ number_format($percent, 1, ',', '.') . '%' }}
                           </div>
                        @endif

                     </li>
                     @endforeach
                  </ul>
               </div>

            </div>
         @endforeach
               
      </div>
   </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/questions.js') }}"></script>
@endpush