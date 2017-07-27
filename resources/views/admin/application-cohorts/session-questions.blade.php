@extends('layouts.app')
@section('content')
    <manage-sessions-question :session-id="{{request()->route('session')->id}}"></manage-sessions-question>
@endsection