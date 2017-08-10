  @extends('layouts.app')
@section('content')
   <div class="container apply">
    <form class="form-horizontal" role="form" method="POST" action="{{ route('application.apply.store',['session'=>request()->route('session')->id]) }}" enctype="multipart/form-data">
          {{ csrf_field() }} 
    <div class="assign-questions">
        @foreach($categories as $category)
              <div class="panel panel-primary" >
            <div class="panel-heading">
                {{$category['name']}}
            </div>
            <div class="panel-body">
              @foreach($category['answers'] as $answer)
                  
              @endforeach
                <div class="question-container" >
                     <p class="ckeditor col-xs-12">{!! $answer['question'] !!}</p>
                       <textarea name="answer" class="summernote col-xs-12" >{!! $answer['answerText'] !!}</textarea> 
                      <hr/>
                </div>
            </div>
        </div>
        @endforeach
       
        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                     Submit
                                </button>
                            </div>
                        </div>
   
  </div>
  </form>

   </div>
@endsection
  @section('page-script')

   <script>      
 
    </script>
  @endsection