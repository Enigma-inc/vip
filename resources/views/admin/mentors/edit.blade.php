@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Mentor</div>
                <div class="panel-body">
                    {!! Form::model($mentor,['method'=>'PATCH','route' => ['mentor.update', $mentor->id],'class'=>'form-horizontal' ,'enctype' => 'multipart/form-data' ]) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                            {!! Form::text('name',null,['class' => 'form-control'])!!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('linkedIn') ? ' has-error' : '' }}">
                            <label for="linkedIn" class="col-md-4 control-label">LinkedIn Profile</label>

                            <div class="col-md-6">
                                 {!! Form::text('linkedin',null,['class' => 'form-control'])!!}
                                @if ($errors->has('linkedIn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('linkedIn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('web-link') ? ' has-error' : '' }}">
                            <label for="web-link" class="col-md-4 control-label">Website Link</label>

                            <div class="col-md-6">
                                {!! Form::text('web_link',null,['class' => 'form-control'])!!}
                                @if ($errors->has('web-link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('web-link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mentor-image') ? ' has-error' : '' }}">
                            <label for="mentor-image" class="col-md-4 control-label">Mentor Image</label>

                            <div class="col-md-6">
                                <input id="mentor-image" type="file" class="form-control" name="mentor-image"
                                  accept=".jpg, .png, .jpeg">

                                @if ($errors->has('mentor-image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mentor-image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <label for="bio" class="col-md-4 control-label">Biography</label>

                            <div class="col-md-6">
                                 {!! Form::textarea('bio',null,['class' => 'form-control'])!!}
                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
   
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                     Submit
                                </button>
                            </div>
                        </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
