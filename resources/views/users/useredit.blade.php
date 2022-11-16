@extends('master.masterlayout')
@section("subtitle","User")

@section("navbar")
<x-navbar2></x-navbar>
@stop

@section("body")
    <form action="/user/edit/fixedit" method="post">
        @csrf
        Nama Lengkap : <input type="text" name="nama_lengkap" id="" value="{{$currentUser->name}}"><br>
        Email : <input type="text" name="email" id="" value="{{$currentUser->email}}" disabled><br>
        Old Password : <input type="password" name="old_password" id="" value="{{$currentUser->password}}"><br>
        New Password : <input type="password" name="new_password" id=""><br>
        Confirm Password : <input type="password" name="conf_password" id=""><br>
        <button type="submit">Update Profile</button>
    </form>
@stop