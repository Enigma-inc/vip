  @extends('layouts.app')
@section('content')
   <div class="container">
   
    <apply :session-id="{{request()->route('session')->id}}" :input-categories="{{$categories}}" :input-answers="{{$answers}}"></apply> 
   </div>
@endsection
  @section('page-script')

   <script>      
      CKEDITOR.replace('.ckeditor');
    </script>
  @endsection