@extends('layouts.main')

@section('content')

      <!-- Main Content Wrapper Start -->
      <div id="content" class="main-content-wrapper">

         @foreach ($homeSections as $section)
            @include($homeSectionsIncludes[$loop->index])
         @endforeach

      </div>
      <!-- Main Content Wrapper End -->

@endsection
