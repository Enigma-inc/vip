 @extends('layouts.app')
 @section('content')
      <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Create Cohort</div>
                <div class="panel-body">
                   {!! Form::open(['method' => 'POST','route'=>'application.sessions.store' , 'class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} required">
                            <label for="title" class="col-md-4 control-label">Cohort Title</label>

                            <div class="col-md-6">
                            {!! Form::text('title',null,['class' => 'form-control'])!!}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('opening-date') ? ' has-error' : '' }} required">
                            <label for="opening-date" class="col-md-4 control-label">Active From</label>

                            <div class="col-md-6">
                            {!! Form::date('opening-date',\Carbon\Carbon::now(),['class' => 'form-control'])!!}
                                @if ($errors->has('opening-date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('opening-date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('closing-date') ? ' has-error' : '' }} required">
                            <label for="closing-date" class="col-md-4 control-label">Closing Date</label>

                            <div class="col-md-6">
                            {!! Form::date('closing-date',\Carbon\Carbon::now(),['class' => 'form-control'])!!}
                                @if ($errors->has('closing-date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('closing-date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                            <label for="active" class="col-md-4 control-label">Activate</label>

                            <div class="col-md-6">
                            {!! Form::checkbox('active', true, ['class' => 'form-control'])!!}
                                @if ($errors->has('active'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                        <div class="form-group{{ $errors->has('slide_title') ? ' has-error' : '' }}">
                            <label for="slide_title" class="col-md-4 control-label">Slide Title</label>

                            <div class="col-md-6">
                            {!! Form::text('slide_title',null,['class' => 'form-control '])!!}
                                @if ($errors->has('slide_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slide_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('slide_text') ? ' has-error' : '' }}">
                            <label for="slide_text" class="col-md-4 control-label">Slide Text</label>

                            <div class="col-md-6">
                                <textarea name="slide_text" rows="3" class="form-control"></textarea> 
                                @if ($errors->has('slide_text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slide_text') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('slide_image') ? ' has-error' : '' }}">
                            <label for="slide_image" class="col-md-4 control-label">Slide Image</label>

                            <div class="col-md-6">
                                <input id="slide_image" type="file" class="form-control" name="slide_image"
                                  accept=".jpg, .png, .jpeg">

                                @if ($errors->has('slide_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slide_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary col-xs-12">
                                     Submit
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
  @endsection
  <style>

</style>