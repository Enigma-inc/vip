@extends('layouts.app')
@section('content')
    <div class="container">
          <div class="row admin-home-page">
               <h2 class="col-xs-12 col-sm-3 ">
                 <a href="{{route('slideshow.list')}}">Slideshows</a>
               </h2 >
               <h2 class="col-xs-12 col-sm-3 ">
                 <a href="{{route('mentor.list')}}">Mentors</a>
               </h2>
          </div>
          <div class="row admin-home-page">
               <h2 class="col-xs-12 col-sm-3 ">
                 <a href="{{route('partner.list')}}">Partner</a>
               </h2 >
               <h2 class="col-xs-12 col-sm-3 ">
                 <a href="{{route('startup.list')}}">Startups</a>
               </h2>
          </div>
          <div class="row admin-home-page margin-bottom-50">
               <h2 class="col-xs-12 col-sm-3 ">
                 <a href="{{route('heads-up.list')}}">Heads up</a>
               </h2>
          </div>
    </div>
@endsection
