@extends('master.masterlayout')
@section("subtitle","User")

@section("navbar")
<x-navbar2></x-navbar>
@stop

@section("body")
    <p>Nama Lengkap : {{$currentUser->name}} <br> Email : {{$currentUser->email}}</p>
    <br> <button><a href="/user/edit"> Update Profile </a></button>
@stop