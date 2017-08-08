@extends('layouts.app')
@section('content')
   <div class="container">  
    <manage-sessions-question :session-id="{{request()->route('session')->id}}"></manage-sessions-question>
   </div>
@endsection