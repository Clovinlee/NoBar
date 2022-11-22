@extends('master.masterlayout')
@section("subtitle","Verify Email")

@section('navbar')
    <x-navbar2></x-navbar2>
@endsection

@section('body')
<div class="d-flex justify-content-center align-items-center flex-column w-100" style="height:100vh; background-size: contain; background-image: url({{ asset('assets/img/bg/footer_bg.jpg') }})">
    <h1>Please Check Your Email!</h1>
    <p class="m-0">You've entered <strong>{{ session()->get("email") }}</strong> as the email address for your
        account.</p>
    <p>Please verify the email by clicking verify button in your email</p>
    <form action="{{ url('/logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger" type="submit">Go Back</button>
    </form>
    <br>
    <form action="{{ url('/email/verify/resend') }}" method="GET">
        @csrf
        <p>Didn't receive the email? <button type="submit" style="color:blue; background: transparent; border: none">Send it back</button></p>
    </form>
    @if (session()->has("message"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("message") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
@endsection