@extends('master.masterlayout')
@section("subtitle","User")

@section("navbar")
<x-navbar2></x-navbar>
@stop

@section("body")

<section class="ucm-area ucm-bg" data-background="{{ asset('assets/img/bg/ucm_bg.jpg') }}">
    {{-- <section class="" data-background="{{ asset('assets/img/bg/ucm_bg.jpg') }}"> --}}
<div class="ucm-bg-shape" data-background="{{ asset('assets/img/bg/ucm_bg_shape.png') }}"></div>
<div class="container">
    <br>
    <br>
    <br>
        <div class="row align-items-end mb-55">
            <div class="col-lg-6">
                <div class="section-title text-left">
                    <span class="sub-title">Profile User</span>
                    <h2 class="">{{$currentUser->name}}</h2>
                </div>
            </div>
        </div>
        <div class="row md-row-cols-2">
            <form action="/user/edit/fixedit" method="post">
                @csrf
                Nama Lengkap : <input type="text" name="nama_lengkap" id="" value="{{$currentUser->name}}"><br>
                Email : <input type="text" name="email" id="" value="{{$currentUser->email}}" disabled><br>
                Old Password : <input type="password" name="old_password" id="" value="{{$currentUser->password}}"><br>
                New Password : <input type="password" name="new_password" id=""><br>
                Confirm Password : <input type="password" name="conf_password" id=""><br>
                <button type="submit">Update Profile</button>
            </form>
        </div>
</div>
</section>
@stop