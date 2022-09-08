@extends('master.masterlayout')
@section("subtitle","Login")

@section('body')
<div class="container d-flex justify-content-center align-items-center flex-column" style="height:100vh">
    <h1>REGISTER</h1>
    @if (session()->has("registerError"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session("registerError") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form class="w-50 border" style="height:max-content">
        <div class="form-group">
            <label for="inpNama">Nama</label>
            <input type="text"  name="nama" class="form-control" id="inpNama" aria-describedby="nama" placeholder="Masukkan Nama" required value="{{ old('nama') }}">
        </div>
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
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
        </div>
        @error('password')
                <div class="invalid-feedback"> 
                    {{ $message }}
                </div>
            @enderror
        <div class="form-group">
            <label for="inpConfirm">Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control @error('confirm_password') is-invalid @enderror" id="inpConfirm" placeholder="Repeat Password">
        </div>
        @error('confirm_password')
          <div class="invalid-feedback"> 
              {{ $message }}
          </div>
        @enderror
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <p>Sudah punya akun? <a href="{{ url("/login") }}">Login sekarang</a></p>
</div>
@endsection