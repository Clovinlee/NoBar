@extends('master.masterlayout')
@section("subtitle","Login")

@section('body')
<div class="container d-flex justify-content-center align-items-center flex-column" style="height:100vh">
    <h1>LOGIN</h1>
    @if (session()->has("loginError"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session("loginError") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form class="w-50 border" style="height:max-content">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" autofocus required value = {{ old("email") }}>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          @error('email')
              <div class="invalid-feedback"> 
                  {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <p>Member baru? <a href="{{ url("/register") }}">Register sekarang</a></p>
</div>
@endsection