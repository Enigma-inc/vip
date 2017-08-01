 @extends('layouts.front')
  @section('content')
         <slideshow></slideshow>
        <headsup></headsup>
        @include('_partials.startups') 
         @include('_partials.mentors') 
         @include('_partials.partners') 
  @endsection