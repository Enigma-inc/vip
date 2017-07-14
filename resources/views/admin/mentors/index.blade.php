@extends('layouts.app') @section('content')
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
                                <th>Email</th>
                                <th>Role/Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($mentors as $mentor)
                            <tr>
                                <td>{{$mentor->name}}</td>
                                <td>{{$mentor->email}}</td>
                                <td>{{$mentor->position}}</td>
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