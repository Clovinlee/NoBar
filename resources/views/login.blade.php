@extends('master.masterlayout')
@section("subtitle","Login")

@section("navbar2")
<x-fixednavbar></x-fixednavbar>
@stop

@section('body')
<div class="container d-flex justify-content-center align-items-center flex-column" style="height:100vh">
    @if (session()->has("loginError"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session("loginError") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1>LOGIN</h1>  
    <form class="w-50" style="height:max-content; border: none" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" autofocus required value="{{ old("email") }}" name="email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          @error('email')
              <div class="invalid-feedback"> 
                  {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <p>Member baru? <a href="{{ url("/register") }}">Register sekarang</a></p>
</div>
@endsection