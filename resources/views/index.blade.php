
@extends('master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1 align="center"> Students</h1>
        </div>
    </div>
    
</div>
<div class="row" align="left">
    <div class="pull-right">
        <a class="btn btn-success" href="{{route('create')}}" > Add New Student </a>
    </div>
</div>
<br/>

@if($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<table class="table table-striped">
    <tr>
        <th>No</th>

        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        
        <th>Option</th>
    </tr>

    @foreach($users as $user)
    
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->student->phone ?? ''}}</td>
        <td>{{$user->student->address ?? ''}}</td>
        <td></td>
        
    </tr>
   @endforeach

   

    
</table>

@endsection