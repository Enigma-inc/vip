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
                                <td>
                                    {{$startup->about}}
                                    <form action="{{route('startup.delete', $startup->id)}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="text" name="file-name" value="{{$startup->id}}" hidden>
                                        <button type="submit" class="btn btn-warning btn-xs margin-right-5"> <i class="fa fa-trash-o"></i> Remove</button>
                                    </form>
                                </td>
                                <td><a href="{{$startup->web_link}}">{{$startup->web_link}}</a></td>
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