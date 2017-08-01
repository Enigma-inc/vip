@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Partner</div>
                <div class="panel-body">
                   {!! Form::open(['class'=>'form-horizontal', 'method' => 'POST', 'route' => 'partner.store', 'enctype' => 'multipart/form-data']) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Partner Name</label>

                            <div class="col-md-6">
                            {!! Form::text('name',null,['class' => 'form-control'])!!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('web_link') ? ' has-error' : '' }}">
                            <label for="web_link" class="col-md-4 control-label">Website Link</label>

                            <div class="col-md-6">
                            {!! Form::text('web_link',null,['class' => 'form-control'])!!}
                                @if ($errors->has('web_link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('web_link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                            <label for="logo" class="col-md-4 control-label">Logo</label>

                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control" name="logo"
                                  accept=".jpg, .png, .jpeg">

                                @if ($errors->has('logo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo') }}</strong>
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
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
