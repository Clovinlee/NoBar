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
            <p>Nama Lengkap : {{$currentUser->name}} <br>
            Email : {{$currentUser->email}}</p>
            <br>
            <a href="{{ url('/user/edit') }}" class="btnMovie popup-video">Update Profile</a>
            {{-- <button><a href="/user/edit"> Update Profile </a></button> --}}
        </div>
</div>
</section>
@stop