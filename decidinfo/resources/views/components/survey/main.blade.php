<h1 class="text-3xl italic mb-6">
   Principal
</h1>

<x-survey.card>
   <div class="mt-4">
      <x-survey.form-field
      arrayName="title"
      dotName="title"
      label="TÍTULO"
      required
      autofocus
      />
   </div>
   
   <div class="my-4">
      <x-survey.form-field
      arrayName="description"
      dotName="description"
      label="DESCRIPCIÓN"
      />
   </div>
</x-survey.card>

<div class="mt-6">
   <x-survey.submit wire:click="validateAndGotoNext">
      Siguiente
      <i class="fas fa-chevron-right ml-2"></i>
   </x-survey.submit>
</div>
