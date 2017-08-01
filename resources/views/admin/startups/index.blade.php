@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
    @foreach($startups as $startup)  
        <div class="col-md-4 profile margin-top-5">
                  
            <div class="panel panel-default bordered">
                <div class="panel-heading">
                    <div class="header">{{$startup->name}}</div>
                </div>
                <div class="panel-body">
                    <div class="avatar-container">
                        <img src="{{Storage::url($startup->logo_path)}}" alt="startup logo" class="avatar thumbnail">
                    </div>

                    <div class="details-container">
                        <div class="startup-label">Name</div>
                        <div class="startup-info">{{$startup->name}}</div>
                    </div>
                    <hr>

                    <div class="details-container">
                        <div class="startup-label">Web Link</div>
                        <div class="startup-info"><a href="{{$startup->web_link}}">{{$startup->web_link}}</a></div>
                    </div>
                    <hr>

                    <div class="details-container">
                        <!--div- class="startup-label">About</div-->
                        <div class="startup-info text-justify">{{$startup->about}}</div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-xs-12 button-flex">
                            <a href="{{route('startup.edit',$startup->id)}}" class="btn btn-info btn-xs margin-right-5"><i class="fa fa-trash-o"></i>Edit</a>
                            <form action="{{route('startup.delete',['id'=>$startup->id])}}" method="POST">
                                {{csrf_field()}}
                                <input type="text" name="file-name"class="" value="{{$startup->id}}" hidden>
                                <button type="submit" class="btn btn-danger btn-xs margin-right-5"><i class="fa fa-trash-o"></i>Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
      @endforeach 
    </div>
    <div class="row text-center">
        {{$startups->links()}}
    </div>
</div>
@endsection