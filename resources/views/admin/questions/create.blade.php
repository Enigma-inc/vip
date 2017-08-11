 @extends('layouts.app')
  @section('content')
           <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Category</div>
                <div class="panel-body">
                   {!! Form::open(['method' => 'POST','route'=>'questions.store' , 'class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-3 control-label">Question</label>

                            <div class="col-md-9">
                            {!! Form::textarea('description',null,['id'=>'ckeditor', 'class' => 'form-control','placeholder'=>'Biographical Details, Company Vision,etc..'])!!}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('index') ? ' has-error' : '' }}">
                            <label for="index" class="col-md-3 control-label">Category Index</label>

                            <div class="col-md-9">
                            {!! Form::number('index',null,['class' => 'form-control','placeholder'=>'1, 2, 3 etc...'])!!}
                                @if ($errors->has('index'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('index') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-3 control-label">Question Category</label>

                            <div class="col-md-9">
                           <select name="category" class= 'form-control '>
                                <option value="">Pick a Question Category...</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" >{{$category->name}}</option>
                                @endforeach
                           </select>
                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
               
                         <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary pull-right">
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

