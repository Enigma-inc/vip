 @extends('layouts.app')
 @section('content')
<div class="container">
<div class="row">
    <div class="co col-xs-12">
        <a href="{{route('questions.categories.create')}}" class="btn btn-primary col-xs-12 col-sm-6 col-md-4 pull-right">Create Category</a>
     </div>
        <div class="panel panel-default">
            <div class="panel-heading">Application Question Categories</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
     </div>
</div>

 @endsection