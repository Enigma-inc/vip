  @extends('layouts.app')
  @section('content')
      <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Category</div>
                <div class="panel-body">
                   {!! Form::open(['method' => 'POST','route'=>'questions.categories.store' , 'class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Category Title</label>

                            <div class="col-md-6">
                            {!! Form::text('name',null,['class' => 'form-control','placeholder'=>'Biographical Details, Company Vision,etc..'])!!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('index') ? ' has-error' : '' }}">
                            <label for="index" class="col-md-4 control-label">Category Index</label>

                            <div class="col-md-6">
                            {!! Form::number('index',null,['class' => 'form-control','placeholder'=>'1, 2, 3 etc...'])!!}
                                @if ($errors->has('index'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('index') }}</strong>
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
    </div>
</div>
  @endsection