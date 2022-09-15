@extends('master.masterlayout')
@section("subtitle","Login")

@section("navbar")
<x-navbar></x-navbar>
@stop

@section('body')
<div class="container col-12 col-md-12 col-lg-4 d-flex flex-column h-screen justify-content-center">
    @if (session()->has("loginError"))
        <div class="alert alert-dismissible fade show alert-danger" role="alert" data-mdb-color="danger">
          <i class="fas fa-times-circle me-3"></i>{{ session("loginError") }}
          <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <form class="md-form w-100 border rounded-3 p-5" method="POST" action="{{ url('/login') }}">
        @csrf
        <h2 class="text-center mb-3">Login Form</h2>

        <!-- Email input -->
        <div class="form-outline" style="margin-bottom: 25px">
            <input id="inpEmail" type="email" name="email" class="form-control @error('email') is-invalid @enderror" autocomplete="on" required value="{{ old("email") }}">
            <label class="form-label" >Email address</label>
            @error('email')
              <div class="invalid-feedback"> 
                  {{ $message }}
              </div>
            @enderror
        </div>

        <!-- Password input -->
        <div class="input-group form-outline mb-4">
            <input type="password" name="password" class="form-control" autocomplete="on"/>
            <label class="form-label">Password</label>
            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-eye-slash pointer" onclick="togglePassword(event)"></i></span>
        </div>

        <div class="row mb-4">
            <div class="col">
                <!-- Simple link -->
                <a href="{{ url('/forgot') }}">Forgot password?</a>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

        <div class="text-center">
            <p>Not a member? <a href="{{ url('/register') }}">Register</a></p>
            <p>or sign up with:</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-google"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-github"></i>
            </button>
        </div>
    </form>
</div>
@stop

@section('pageScript')
    <script>
        function togglePassword(e){
            let pw = $(e.target);
            let pwHidden = pw.hasClass("fa-eye-slash");
            let inp = pw.parent().parent().find("input");

            if(pwHidden){
                pw.removeClass("fa-eye-slash");
                pw.addClass("fa-eye");
                inp.attr("type","text");
            }else{
                pw.removeClass("fa-eye");
                pw.addClass("fa-eye-slash");
                inp.attr("type","password");
            }
        }
    </script>
@stop