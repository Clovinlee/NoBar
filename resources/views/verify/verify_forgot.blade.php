@extends('master.masterlayout')
@section("subtitle","Verify Email")

@section('navbar')
    <x-navbar></x-navbar>
@endsection

@section('body')
<div class="d-flex justify-content-center align-items-center flex-column w-100" style="background-color: ; height:100vh">
    <div class="border rounded-3 shadow d-flex justify-content-center flex-column align-items-center p-5">
        <h1>Please Check Your Email!</h1>
        <p class="m-0">You've entered <strong>{{ session()->get("email") }}</strong> as the email address for your
            account.</p>
        <p>Please verify the email by clicking verify button in your email</p>
        <form action="{{ url('/forgot_password') }}" method="GET">
            @csrf
            <p>Didn't receive the email?<button type="submit"style="color:blue; background: transparent; border: none">Send it back</button></p>
        </form>
        @if (session()->has("message"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("message") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
</div>
@endsection