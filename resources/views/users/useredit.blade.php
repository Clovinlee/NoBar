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
            {{-- href="{{ url('/user/edit') }} --}}
            <form action="{{url('/user/edit/fixedit')}}" method="post">
                @csrf
                <div class="input-group flex-nowrap" >
                    <span class="input-group-text" id="addon-wrapping" style="color: white">Nama Lengkap</span>
                    <input type="text" name="nama_lengkap" id="" value="{{$currentUser->name}}">
                </div><br>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping" style="color: white">Email</span>
                    <input type="text" name="email" id="" value="{{$currentUser->email}}" disabled style="color: white">
                </div><br>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping" style="color: white">Old Password</span>
                    <input type="password" name="old_password" id="" value="">
                </div><br>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping" style="color: white">New Password</span>
                    <input type="password" name="new_password" id="">
                </div><br>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping" style="color: white">Confirm Password</span>
                    <input type="password" name="conf_password" id="">
                </div><br>
                <button type="submit" class="btn btn-warning">Update Profile</button>
            </form>
        </div>
</div>
</section>
@stop