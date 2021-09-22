@extends('layout')
@section('content')

<form action="action_page.php" method="post">
  <div class="imgcontainer">
    <img src="uploads/images/logo.png" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <div class="pull-right">
        <a class="btn btn-success" href="{{route('index')}}"> login </a>
    </div>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>





@endsection