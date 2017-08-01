@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
    @foreach($partners as $partner)  
        <div class="col-md-4 profile margin-top-5">
                  
            <div class="panel panel-default bordered">
                <div class="panel-heading">
                    <div class="header">{{$partner->name}}</div>
                </div>
                <div class="panel-body">
                    <div class="avatar-container">
                        <img src="{{Storage::url($partner->logo_path)}}" alt="partner logo" class="avatar thumbnail">
                    </div>

                    <div class="details-container">
                        <div class="mentor-label">Name</div>
                        <div class="mentor-info">{{$partner->name}}</div>
                    </div>
                    <hr>

                    <div class="details-container">
                        <div class="mentor-label">Web Link</div>
                        <div class="mentor-info"><a href="{{$partner->web_link}}">{{$partner->web_link}}</a></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 button-flex">
                            <a href="{{route('partner.edit',$partner->id)}}" class="btn btn-info btn-xs margin-right-5"><i class="fa fa-trash-o"></i>Edit</a>
                            <form action="{{route('partner.delete',['id'=>$partner->id])}}" method="POST">
                                {{csrf_field()}}
                                <input type="text" name="file-name"class="" value="{{$partner->id}}" hidden>
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
        {{$partners->links()}}
    </div>
</div>
@endsection