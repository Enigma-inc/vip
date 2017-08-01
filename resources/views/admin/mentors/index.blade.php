@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Active Mentors</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Names</th>
                                <th>Web Link</th>
                                <th>LinkedIn Profile</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($mentors as $mentor)
                            <tr>
                                <td>{{$mentor->name}}</td>
                                <td>
                                    <a href="{{$mentor->web_link}}">{{$mentor->web_link}}</a>
                                </td>
                                <td>
                                    <a href="{{$mentor->web_link}}">{{$mentor->linkedin}}</a>
                                </td>
                                <td>
                                    <img src="{{Storage::url($mentor->image_path)}}" alt="mentor image" class="rounded img-thumbnail">
                                </td class="button-flex"> 
                                <td><a href="{{route('mentor.edit',['id'=>$mentor->id])}}">Edit</a></td>
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