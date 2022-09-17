@extends('master.masterlayout')
@section("subtitle","Reset Password")

@section('navbar')
    <x-navbar></x-navbar>
@endsection

@section('body')
<div class="container col-12 col-md-12 col-lg-4 d-flex flex-column h-screen justify-content-center">

    <form class="md-form w-100 border rounded-3 p-5 shadow" method="POST">
        @csrf
        <h2 class="">Reset Password</h2>
        <p class="text-muted lh-sm fw-light">Enter your new password</p>

        <!-- Password input -->
        <div class="input-group form-outline mb-4">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="on"/>
            <label class="form-label">New Password</label>
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
            <label class="form-label">Retype New Password</label>
            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-eye-slash pointer" onclick="togglePassword(event)"></i></span>
            @error('confirm_password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
    </form>
</div>
@endsection

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