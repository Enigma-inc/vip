 @extends('layouts.app')
 @section('content')
      <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Cohort</div>
                <div class="panel-body">
                   {!! Form::open(['method' => 'POST','route'=>'application.sessions.store' , 'class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
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
                        <div class="form-group{{ $errors->has('opening-date') ? ' has-error' : '' }}">
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
                        <div class="form-group{{ $errors->has('closing-date') ? ' has-error' : '' }}">
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
                            {!! Form::checkbox('activate',true,['class' => 'form-control'])!!}
                                @if ($errors->has('active'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('activate') }}</strong>
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