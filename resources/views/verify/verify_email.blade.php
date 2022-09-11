@extends('master.masterlayout')
@section("subtitle","Verify Email")

@section('body')
<div class="d-flex justify-content-center align-items-center flex-column w-100" style="background-color: ; height:100vh">
    <h1>Please Check Your Email!</h1>
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