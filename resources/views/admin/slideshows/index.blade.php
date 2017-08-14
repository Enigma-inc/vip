@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="co col-xs-12">
            <a href="{{route('slideshow.create')}}" class="btn btn-primary col-xs-12 col-sm-6 col-md-4 pull-right">Add Slideshow</a>
        </div>
            <div class="panel">
                <div class="panel-heading">slideshows</div>
            <div class="panel-body">
    @foreach($slideshows as $slideshow)  
        <div class="col-md-6 profile margin-top-5" >
                  
            <div class="panel  panel-primary bordered" style="height:470px;">
                <div class="panel-heading">
                    <div class="header">{{$slideshow->title}}</div>
                </div>
                <div class="panel-body">
                    <div class="avatar-container">
                        <img src="{{Storage::url($slideshow->bgImage_path)}}" alt="slideshow background Image" class="avatar thumbnail">
                    </div>

                    <div class="details-container">
                        <div class="mentor-label">Title</div>
                        <div class="mentor-info">{{$slideshow->title}}</div>
                    </div>
                    <hr>

                    <div class="details-container">
                        <div class="mentor-label">Button Link</div>
                        <div class="mentor-info"><a href="{{$slideshow->web_link}}">{{$slideshow->button_link}}</a></div>
                    </div>
                    <hr>
                     <div class="details-container">
                        <div class="mentor-info">{{$slideshow->description}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 button-flex">
                            <a href="{{route('slideshow.edit',$slideshow->id)}}" class="btn btn-info btn-xs margin-right-5"><i class="fa fa-trash-o"></i>Edit</a>
                            <form action="{{route('slideshow.delete',['id'=>$slideshow->id])}}" method="POST">
                                {{csrf_field()}}
                                <input type="text" name="file-name"class="" value="{{$slideshow->id}}" hidden>
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
    </div>
    <div class="row text-center">
        {{$slideshows->links()}}
    </div>
</div>
@endsection