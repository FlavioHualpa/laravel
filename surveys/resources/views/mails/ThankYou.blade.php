@component('mail::message')
## Hola {{ $survey->taker_name }}, queremos agradecerte por tu tiempo

### Este es el resumen de tu encuesta

#### {{ $survey->questionnaire->name }}

@foreach ($survey->surveyResponses as $response)
   <div style="width: 600px; padding: 5px 15px; font-weight: bold;">
      {{ $loop->iteration }}.
      {{ $response->choice->question->question }}
   </div>
   <div style="width: 250px; padding: 5px 15px; margin-bottom: 8px;">
      Tu respuesta:
      <span style="background-color: #f8f0f0; padding: 5px 15px;">
         {{ $response->choice->choice }}
      </span>
   </div>
@endforeach

<br>
Gracias,<br>
{{ config('app.name') }}
@endcomponent
