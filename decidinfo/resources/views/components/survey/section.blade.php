@props([
   'currentSection',
   'isCurrentSectionLast',
   'questions',
   'showAlert',
   'alertMessage'
])

@if ($showAlert)
   <x-survey.card color="red">
      <p class="text-red-600">
         {{ $alertMessage }}
      </p>
   </x-survey.card>
@endif

<x-survey.card>
   <div class="flex justify-between">
      <div>
         <h1 class="text-3xl italic mb-6">
            Sección {{ $currentSection + 1 }}
         </h1>
      </div>
      <div>
         <x-survey.submit wire:click="addSection({{$currentSection}})" :compact="true">
            <i class="far fa-caret-square-up"></i>
         </x-survey.submit>
         <x-survey.submit wire:click="addSection({{$currentSection + 1}})" :compact="true">
            <i class="far fa-caret-square-down"></i>
         </x-survey.submit>
         @unless ($currentSection == 0 && $isCurrentSectionLast)
         <x-survey.submit color="red" wire:click="deleteSection({{$currentSection}})" :compact="true">
            <i class="far fa-minus-square"></i>
         </x-survey.submit>
         @endunless
      </div>
   </div>

   <div class="mt-4">
      <x-survey.form-field
         arrayName="sections[{{$currentSection}}][title]"
         dotName="sections.{{$currentSection}}.title"
         label="TÍTULO"
         required
         autofocus
      />
   </div>

   <div class="my-4">
      <x-survey.form-field
         arrayName="sections[{{$currentSection}}][description]"
         dotName="sections.{{$currentSection}}.description"
         label="DESCRIPCIÓN"
      />
   </div>
</x-survey.card>

@foreach ($questions as $question)
   <x-survey.card color="blue">
      <div class="flex justify-between">
         <div>
            <h2 class="text-2xl italic mb-2">
               Pregunta {{ $loop->iteration }}
            </h2>
         </div>
         <div>
            <x-survey.submit wire:click="addQuestion({{$loop->index}})" :compact="true">
               <i class="far fa-caret-square-up"></i>
            </x-survey.submit>
            <x-survey.submit wire:click="addQuestion({{$loop->iteration}})" :compact="true">
               <i class="far fa-caret-square-down"></i>
            </x-survey.submit>
            @unless ($loop->count == 1)
            <x-survey.submit color="red" wire:click="deleteQuestion({{$loop->index}})" :compact="true">
               <i class="far fa-minus-square"></i>
            </x-survey.submit>
            @endunless
         </div>
      </div>

      <div class="my-4">
         <x-survey.form-field
            arrayName="sections[{{$currentSection}}][questions][{{$loop->index}}][title]"
            dotName="sections.{{$currentSection}}.questions.{{$loop->index}}.title"
            label="TÍTULO"
            required
         />
      </div>

      <div class="my-4">
         <x-survey.form-field
            arrayName="sections[{{$currentSection}}][questions][{{$loop->index}}][description]"
            dotName="sections.{{$currentSection}}.questions.{{$loop->index}}.description"
            label="DESCRIPCIÓN"
         />
      </div>

      <div class="my-4">
         <x-survey.form-select
            arrayName="sections[{{$currentSection}}][questions][{{$loop->index}}][type]"
            dotName="sections.{{$currentSection}}.questions.{{$loop->index}}.type"
            label="TIPO DE PREGUNTA"
         >
            <option value="short_answer"
               {{ $question == 'short_answer' ? 'checked' : '' }}>
               Respuesta corta
            </option>
            <option value="long_answer"
               {{ $question == 'long_answer' ? 'checked' : '' }}>
               Texto largo
            </option>
            <option value="multiple_choice"
               {{ $question == 'multiple_choice' ? 'checked' : '' }}>
               Elegir una opción
            </option>
            <option value="check_boxes"
               {{ $question == 'check_boxes' ? 'checked' : '' }}>
               Elegir varias opciones
            </option>
            <option value="drop_down"
               {{ $question == 'drop_down' ? 'checked' : '' }}>
               Lista de opciones
            </option>
            <option value="linear_scale"
               {{ $question == 'linear_scale' ? 'checked' : '' }}>
               Rango numérico
            </option>
         </x-survey.form-select>
      </div>

      <div class="my-4">
         <input type="checkbox"
            wire:model.lazy="sections.{{$currentSection}}.questions.{{$loop->index}}.required"
            id="sections.{{$currentSection}}.questions.{{$loop->index}}.required"
            name="sections[{{$currentSection}}][questions][{{$loop->index}}][required]"
            class="transform scale-125 mr-1"
         >
         <label for="sections.{{$currentSection}}.questions.{{$loop->index}}.required" class="text-sm">
            Requerida
         </label>
         @error("sections.{{$currentSection}}.questions.{{$loop->index}}.required")
            <p class="text-sm text-red-600">
               {{ $message }}
            </p>
         @enderror
      </div>

      @switch($question["type"])
         @case("multiple_choice")
         @case("check_boxes")
         @case("drop_down")

            <hr class="my-6 border-blue-400">

            @foreach ($question["choices"] as $choice)
               <div class="my-4">
                  <x-survey.choice-field
                     arrayName="sections[{{$currentSection}}][questions][{{$loop->parent->index}}][choices][{{$loop->index}}][title]"
                     dotName="sections.{{$currentSection}}.questions.{{$loop->parent->index}}.choices.{{$loop->index}}.title"
                     label="OPCIÓN {{$loop->iteration}}"
                     deleteAction="deleteChoice({{$loop->parent->index}},{{$loop->index}})"
                     addBeforeAction="addChoice({{$loop->parent->index}},{{$loop->index}})"
                     addAfterAction="addChoice({{$loop->parent->index}},{{$loop->iteration}})"
                  />
               </div>
            @endforeach

            @break

         @case("linear_scale")
              
            @break

         @default
      @endswitch
   </x-survey.card>
@endforeach

<div class="mt-6">
   <x-survey.submit wire:click="validateAndGotoPrev">
      <i class="fas fa-chevron-left mr-2"></i>
      Anterior
   </x-survey.submit>

   @if ($isCurrentSectionLast)
      <x-survey.submit wire:click="store">
         Finalizar
         <i class="fas fa-chevron-right ml-2"></i>
      </x-survey.button>
   @else
      <x-survey.submit wire:click="validateAndGotoNext">
         Siguiente
         <i class="fas fa-chevron-right ml-2"></i>
      </x-survey.button>
   @endif
</div>
