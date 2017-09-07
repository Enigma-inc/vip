@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel  panel-primary">
                <div class="panel-heading">Edit Slideshow</div>
                <div class="panel-body">
                    {!! Form::model($slideshow,['method'=>'PATCH','route' => ['slideshow.update', $slideshow->id],'class'=>'form-horizontal','enctype' => 'multipart/form-data' ]) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Slideshow Title</label>

                            <div class="col-md-8">
                            {!! Form::text('title',null,['class' => 'form-control'])!!}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('button_link') ? ' has-error' : '' }}">
                            <label for="button_link" class="col-md-4 control-label">Button Link</label>

                            <div class="col-md-8">
                            {!! Form::text('button_link',null,['class' => 'form-control'])!!}
                                @if ($errors->has('button_link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('button_link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('button_text') ? ' has-error' : '' }}">
                            <label for="button_text" class="col-md-4 control-label">Button Text</label>

                            <div class="col-md-8">
                            {!! Form::text('button_text',null,['class' => 'form-control'])!!}
                                @if ($errors->has('button_text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('button_text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('background_image') ? ' has-error' : '' }}">
                            <label for="background_image" class="col-md-4 control-label">Background Image</label>

                            <div class="col-md-8">
                                <input id="background_image" type="file" class="form-control" name="background_image"
                                  accept=".jpg, .png, .jpeg">

                                @if ($errors->has('background_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('background_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-8">
                            {!! Form::textarea('description',null,['class' => 'form-control'])!!}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
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
@section('page-script')
  <script type="text/javascript">
      $(document).ready(function() {
          $('textarea').summernote({
            height:300,
          });
      });
  </script>
@endsection
