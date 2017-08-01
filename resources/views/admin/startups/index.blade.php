@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
                @foreach($startups as $startup)
                <div class="panel panel-default col-xs-12 col-sm-6 col-md-4">
                    <div class="panel-heading">
                         {{$startup->name}}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                             <img class="img-responsive" src="{{Storage::url($startup->logo_path)}}" alt="startup logo">
                        </div>
                        <div class="row">
                                 <p class="col-xs-12">
                                     {{$startup->about}}
                                 </p>
                                 <div class="col-xs-12">
                                     <a href="{{$startup->web_link}}">{{$startup->web_link}}</a>
                                 </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <a  href="{{route('startup.edit',$startup->id)}}" class="btn btn-link"> <i class="fa fa-pencil"></i> Edit</a>
                            <a src="#" class="btn btn-link">Remove</a>
                        </div>
                    </div>
                </div>
                         @endforeach 
        </div>
    </div>
</div>
@endsection