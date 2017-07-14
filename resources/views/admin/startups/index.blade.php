@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Active Startups</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>About</th>
                                <th>Website Link</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($startups as $startup)
                            <tr>
                                <td>{{$startup->name}}</td>
                                <td>{{$startup->about}}</td>
                                <td>{{$startup->web_link}}</td>
                                <td><a href="{{route('startup.edit',['id'=>$startup->id])}}">Edit</a></td>
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