@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="co col-xs-12">
            <a href="{{route('application.sessions.create')}}" class="btn btn-primary col-xs-12 col-sm-6 col-md-4 pull-right">Create Cohort</a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Cohorts</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Cohort Title</th>
                                <th>Opening Date</th>
                                <th>Closing Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($applicationSessions as $session)
                            <tr>
                                <td>{{$session->title}}</td>
                                <td>{{$session->opening_date}}</td>
                                <td>{{$session->closing_date}}</td>
                                <td>{{$session->active}}</td>
                                <td class="button-flex">
                                    <a href="{{route('application.sessions.edit',$session->id)}}"  class="btn btn-primary btn-xs margin-right-5"><i class="fa fa-trash-o"></i>Edit</a>
                                    @if($session->active == 1)
                                      <form action="{{route('application.sessions.deactivate',['id'=>$session->id])}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="text" name="file-name"class="" value="{{$session->id}}" hidden>
                                        <button type="submit" class="btn btn-warning btn-xs margin-right-5"><i class="fa fa-trash-o"></i>Deactivate</button>
                                    </form>                                
                                    @endif
                                    @if($session->active==0)
                                    <form action="{{route('application.sessions.activate',['id'=>$session->id])}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="text" name="file-name"class="" value="{{$session->id}}" hidden>
                                        <button type="submit" class="btn btn-warning btn-xs margin-right-5"><i class="fa fa-trash-o"></i>Activate</button>
                                    </form>
                                    @endif                                
                                </td>
                            </tr>
                         @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
@endsection
