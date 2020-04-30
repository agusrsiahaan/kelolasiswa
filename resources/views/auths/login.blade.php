@extends('auths.master')
@section('content')
  <form class="user" action="/postlogin" method="POST">
    {{csrf_field()}}
    <div class="form-group">
      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Enter Email Address...">
    </div>
    <div class="form-group">
      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox small">
        <input type="checkbox" class="custom-control-input" id="customCheck">
        <label class="custom-control-label" for="customCheck">Remember Me</label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
    <hr>
    <a href="index.html" class="btn btn-google btn-user btn-block">
      <i class="fab fa-google fa-fw"></i> Login with Google
    </a>
    <a href="index.html" class="btn btn-facebook btn-user btn-block">
      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
    </a>
  </form>
  <hr>
   <div class="text-center">
    <a class="small" href="forgot-password.html">Forgot Password?</a>
  </div>
  <div class="text-center">
    <a class="small" href="register.html">Create an Account!</a>
  </div> 
@endsection