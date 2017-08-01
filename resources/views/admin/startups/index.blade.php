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
                    <hr>

                    <div class="details-container">
                        <!--div- class="startup-label">About</div-->
                        <div class="startup-info text-justify">{{$startup->about}}</div>
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
      @endforeach 
    </div>
    <div class="row text-center">
        {{$startups->links()}}
    </div>
</div>
@endsection