@extends('layouts.app')

@section('content')
<div class="container">
   <section class="row justify-content-center">
      <header class="col-md-10 rounded" style="background-color: rgba(0,0,0,0.1);">
         <h3 class="mt-3">
            <a href="{{ route('file.download') }}">Download PDF</a>
         </h3>
         <h3 class="mt-3">
            <a href="{{ route('file.view') }}" target="new">View PDF</a>
         </h3>
      </header>
   </section>
</div>
@endsection
