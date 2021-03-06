@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <a href="{{route('heads-up.create')}}" class="btn btn-primary col-xs-12 col-sm-6 col-md-4 pull-right">Add Article</a>
        </div>
            <div class="panel">
                <div class="panel-heading text-vodacom">Heads-up</div>
            <div class="panel-body">
    @foreach($headsUp as $headsUp)
        <div class="col-md-4 profile margin-top-5">

            <div class="panel panel-primary bordered" style="height:450px;">
                <div class="panel-heading">
                    <div class="header">{{$headsUp->title}}</div>
                </div>
                <div class="panel-body">
                    <div class="avatar-container">
                        <img src="{{Storage::url($headsUp->image_path)}}" alt="partner logo" class="avatar thumbnail">
                    </div>

                    <div class="details-container">
                        <div class="mentor-label">Title</div>
                        <div class="mentor-info">{{$headsUp->title}}</div>
                    </div>
                    <hr>

                    <div class="details-container">
                        <div class="mentor-label">Link</div>
                        <div class="mentor-info"><a href="{{$headsUp->url}}">{{$headsUp->url}}</a></div>
                    </div>
                     <hr>

                    @if ($headsUp->body)
                      <div class="details-container">
                          <div style="height: 100px;overflow-y: auto;">{!!$headsUp->body!!}</div>
                      </div>
                      <hr>
                    @endif

                    <div class="row">
                        <div class="col-xs-12 button-flex">
                             <a href="{{route('heads-up.edit',$headsUp->id)}}" class="btn btn-info btn-xs margin-right-5"><i class="fa fa-trash-o"></i> Edit</a>
                            <form action="{{route('heads-up.delete',['id'=>$headsUp->id])}}" method="POST">
                                {{csrf_field()}}
                                <input type="text" name="file-name"class="" value="{{$headsUp->id}}" hidden>
                                <button type="submit" class="btn btn-danger btn-xs margin-right-5"><i class="fa fa-trash-o"></i> Remove</button>
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

</div>
@endsection
