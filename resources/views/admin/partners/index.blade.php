@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Partners</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Website Link</th>
                                <th>Logo</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($partners as $partner)
                            <tr>
                                <td>{{$partner->name}}</td>
                                <td>{{$partner->about}}</td>
                                <td>
                                    <a href="{{$partner->web_link}}">{{$partner->web_link}}</a>
                                </td>
                                <!--td>
                                    <img src="{{Storage::url($partner->logo_path)}}" alt="partner logo">
                                </td-->
                                <td>
                                      <a href="{{route('partner.edit',$partner->id)}}" class="btn btn-primary btn-xs margin-right-5"><i class="fa fa-trash-o"></i>Edit</a>                                
                                    <form action="{{route('partner.delete',['id'=>$partner->id])}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="text" name="file-name"class="" value="{{$partner->id}}" hidden>
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