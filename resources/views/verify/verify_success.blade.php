@extends('master.masterlayout')
@section("subtitle","Redirecting...")

@section('body')
<div class="h-screen" style="background-size: contain; background-image: url({{ asset('assets/img/bg/footer_bg.jpg') }})">
    <div class="d-flex flex-column justify-content-center align-items-center h-100">
        <h1>Email verified!</h1>
        <h3>Redirecting you to main page...</h3>
        <a href="{{ url('/') }}">Click here if you're not redirected after 3 seconds</a>
    </div>
</div>
@endsection