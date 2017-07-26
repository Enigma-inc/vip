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
