@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="co col-xs-12">
            <a href="{{route('mentor.create')}}" class="btn btn-primary col-xs-12 col-sm-6 col-md-4 pull-right">Add Mentor</a>
        </div>
            <div class="panel panel-default">
                <div class="panel-heading">Mentors</div>
            <div class="panel-body">
    @foreach($mentors as $mentor)  
        <div class="col-md-4 profile margin-top-5">
                  
            <div class="panel panel-default bordered">
                <div class="panel-heading">
                    <div class="header">{{$mentor->name}}</div>
                </div>
                <div class="panel-body">
                    <div class="avatar-container">
                        <img src="{{Storage::url($mentor->image_path)}}" alt="mentor image" class="avatar thumbnail">
                    </div>

                    <div class="details-container">
                        <div class="mentor-label">Name</div>
                        <div class="mentor-info">{{$mentor->name}}</div>
                    </div>
                    <hr>

                    <div class="details-container">
                        <div class="mentor-label">Web Link</div>
                        <div class="mentor-info"><a href="{{$mentor->web_link}}">{{$mentor->website_link}}</a></div>
                    </div>
                    <hr>

                    <div class="details-container">
                        <div class="mentor-label">LinkedIn Profile</div>
                        <div class="mentor-info"><a href="{{$mentor->linkedin}}">{{$mentor->linkedin}}</a></div>
                    </div>
                    <hr>
                     <div class="details-container">
                        <div class="mentor-info">{{$mentor->bio}}</div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-xs-12 button-flex">
                            <a href="{{route('mentor.edit',$mentor->id)}}" class="btn btn-info btn-xs margin-right-5"><i class="fa fa-trash-o"></i>Edit</a>
                            <form action="{{route('mentor.delete',['id'=>$mentor->id])}}" method="POST">
                                {{csrf_field()}}
                                <input type="text" name="file-name"class="" value="{{$mentor->id}}" hidden>
                                <button type="submit" class="btn btn-danger btn-xs margin-right-5"><i class="fa fa-trash-o"></i>Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
      @endforeach 
      
      </div>
      </div>
    </div>
    <div class="row text-center">
        {{$mentors->links()}}
    </div>
</div>
@endsection