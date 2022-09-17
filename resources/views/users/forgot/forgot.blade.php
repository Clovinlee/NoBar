@extends('master.masterlayout')
@section("subtitle","Forgot Password")

@section("navbar")
<x-navbar></x-navbar>
@stop

@section('body')
<div class="container col-12 col-md-12 col-lg-4 d-flex flex-column h-screen justify-content-center">

    <form class="md-form w-100 border rounded-3 p-5 shadow" method="POST">
        @csrf
        <h2 class="">Forgot Password</h2>
        <p class="text-muted lh-sm fw-light">Enter the email address associated with your account and we'll send you a link to reset your password</p>

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

        <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
        <a href="{{ url('/login') }}">Return to login page</a>
    </form>
</div>
    @if (session()->has("error"))
        <x-toast title="Error" type="danger">{{ session("error") }}</x-toast>
    @endif
@endsection