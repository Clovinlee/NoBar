@extends('master.masterlayout')
@section("subtitle","Register")

@section("navbar2")
<x-fixednavbar></x-fixednavbar>
@stop

@section('body')
<div class="container d-flex justify-content-center align-items-center flex-column" style="height:100vh">
    <h1>REGISTER</h1>
    @if (session()->has("registerError"))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session("registerError") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form class="w-50 border" style="height:max-content" method="POST">
        @csrf
        <div class="form-group">
            <label for="inpNama">Nama</label>
            <input type="text" name="name" class="form-control" id="inpNama" aria-describedby="nama"
                placeholder="Masukkan Nama" required value="{{ old('name') }}" autofocus required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Enter email" name="email" required value={{ old("email") }}>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @else
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                id="exampleInputPassword1" placeholder="Password">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="inpConfirm">Confirm Password</label>
            <input type="password" name="confirm_password"
                class="form-control @error('confirm_password') is-invalid @enderror" id="inpConfirm"
                placeholder="Repeat Password">
            @error('confirm_password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <p>Sudah punya akun? <a href="{{ url("/login") }}">Login sekarang</a></p>
</div>
@endsection