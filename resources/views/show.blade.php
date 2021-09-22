@extends('layouts.app')  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
  <div class="jumbotron">
  

     <table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Address</th>

    </tr>
    <tr>
        <td>{{auth::user()->id}}</td>
        <td>{{auth::user()->name}}</td>
        <td>{{auth::user()->email}}</td>
        <td>{{auth::user()->student->phone ?? ''}}</td>
        <td>{{auth::user()->student->address ?? ''}}</td>
        
    </tr>
  </div>
  <br/>
  
  
    

</div>




    

@endsection