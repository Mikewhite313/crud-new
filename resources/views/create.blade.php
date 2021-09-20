@extends('layout')
   
@section('content')
   
   <div class="container">
  <div class="jumbotron">
    <h1>New Student Form</h1>
  </div>
 <div class="panel panel-success">
      <div class="panel-heading">
        Create New Student
      </div>
      <div class="panel-body">
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
         <form action="{{ route('student.store') }}" method="post"  enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                    <label for="roll">Roll Number</label>
                    <input type="text" class="form-control" placeholder="Roll Number" name="roll" id="email">
                 </div>
                </div>
                <div class="col-md-8">
                <div class="form-group">
                    <label for="roll">Student Name <span class="required">*</span></label>
                    <input type="text" class="form-control" placeholder="Student Name" name="name" id="name">
                 </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                 </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone">
                 </div>
                </div>
                    <div class="col-md-12">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" placeholder="Address" name="address" id="address">
                 </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                  <strong>Image</strong>
                  <input type="file" name="image" class="custom-file-input">
                  
                  </div>
                </div>
                
              </div>
              <br/>
              <button type="submit" class="btn btn-primary">Add</button>
              <a href="{{ route('index') }}" class="btn btn-danger">Back</a>
            </form> 
      </div>
    </div>
</div>

    
@endsection