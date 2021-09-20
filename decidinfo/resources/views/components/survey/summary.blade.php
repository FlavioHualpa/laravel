@props(['survey'])

   <h2 class="text-xl">
      {{ $survey->title }}
   </h2>
   <h3 class="text-sm text-blue-500">
      {{ $survey->description }}
   </h3>

   <svg xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      fill="currentColor hover:text-gray-500"
      class="absolute top-2 right-4 cursor-pointer" viewBox="0 0 16 16"
   >
      <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
   </svg>

   <div class="mt-4 flex flex-nowrap justify-end gap-x-2">
      <div class="p-2 border border-gray-300 rounded mr-auto text-center">
         <p class="mt-1 text-xs text-gray-700">
            CREADA EL
         </p>
         <p class="text-lg text-yellow-700">
            {{ $survey->created_at->format('d/m/Y') }}
         </p>
      </div>
      <x-survey.cardbox
         :highlight="$survey->sections_count"
         caption="SECCIONES"
      />
      <x-survey.cardbox
         :highlight="$survey->all_questions_count"
         caption="PREGUNTAS"
      />
      <x-survey.cardbox
         :highlight="$survey->responses_count"
         caption="RESPUESTAS"
      />
   </div>