@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Active slideshow Details</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Link</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($slideshows as $slideshow)
                            <tr>
                                <td>{{$slideshow->title}}</td>
                                <td>{{$slideshow->description}}</td>
                                <td>
                                    <a href="{{$slideshow->button_link}}">{{$slideshow->button_link}}</a>
                                </td>
                                 <td class="button-flex">
                                    <a href="{{route('slideshow.edit',$slideshow->id)}}"  class="btn btn-primary btn-xs margin-right-5"><i class="fa fa-trash-o"></i>Edit</a>                                
                                    <form action="{{route('slideshow.delete',['id'=>$slideshow->id])}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="text" name="file-name"class="" value="{{$slideshow->id}}" hidden>
                                        <button type="submit" class="btn btn-warning btn-xs margin-right-5"><i class="fa fa-trash-o"></i>Remove</button>
                                    </form>
                                </td>

                            </tr>
                         @endforeach                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection