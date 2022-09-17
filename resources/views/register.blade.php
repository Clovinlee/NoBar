@extends('master.masterlayout')
@section("subtitle","Register")

@section("navbar")
<x-navbar></x-navbar>
@stop

@section('body')
<div class="container col-12 col-md-12 col-lg-4 d-flex flex-column h-screen justify-content-center">
    @if (session()->has("registerError"))
        <div class="alert alert-dismissible fade show alert-danger" role="alert" data-mdb-color="danger">
          <i class="fas fa-times-circle me-3"></i>{{ session("registerError") }}
          <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form class="md-form w-100 border rounded-3 p-5 shadow" method="POST" action="{{ url('/register') }}">
        @csrf
        <h2 class="text-center mb-3">Register Form</h2>

        <!-- Name input -->
        <div class="form-outline mb-4">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"/>
          <label class="form-label">Nama</label>
          @error('name')
              <div class="invalid-feedback"> 
                  {{ $message }}
              </div>
            @enderror
        </div>

        <!-- Email input -->
        <div class="form-outline" style="margin-bottom: 25px">
            <input id="inpEmail" type="email" name="email" class="form-control @error('email') is-invalid @enderror" autocomplete="on" required value="{{ old('email') }}">
            <label class="form-label" >Email address</label>
            @error('email')
              <div class="invalid-feedback"> 
                  {{ $message }}
              </div>
            @enderror
        </div>

        <!-- Password input -->
        <div class="input-group form-outline mb-4">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="on"/>
            <label class="form-label">Password</label>
            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-eye-slash pointer" onclick="togglePassword(event)"></i></span>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Confirm Password input -->
        <div class="input-group form-outline mb-4">
            <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" autocomplete="on"/>
            <label class="form-label">Retype Password</label>
            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-eye-slash pointer" onclick="togglePassword(event)"></i></span>
            @error('confirm_password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
      
        <!-- Checkbox -->
        <div class="form-check d-flex justify-content-start mb-4">
          <input class="form-check-input me-2" name="cbTerm" type="checkbox" @if (old('cbTerm')) checked @endif required />
          <label class="form-check-label">
            I Agree with NoBar <a href="#">terms and conditions</a>
          </label>
        </div>
      
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>
        <p class="text-center">Already a member? <a href="{{ url('/login') }}">Login now</a></p>

        <!-- Register buttons -->
        <div class="text-center">
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