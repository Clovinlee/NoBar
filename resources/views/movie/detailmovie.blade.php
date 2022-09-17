@extends('master.masterlayout')
@section("subtitle",$movie["judul"])

@section("navbar")
<x-navbar></x-navbar>
@stop

@section('body')
<div class="container py-4">
    <h2>Now Playing</h2>
    <div class="row mt-3">
        <div class="col-12 col-md-4">
          <x-lightbox id="myImg" img="{{ $movie['image'] }}"> {{ $movie["judul"] }} </x-lightbox>
        </div>

        <div class="col-12 col-md-8">
            <h3>{{ $movie["judul"] }}</h3>
            <table class="table table-striped">
                <tr>
                    <td>Genre</td>
                    <td>:</td>
                    <td>{{ $movie["genre"] }}</td>
                </tr>
                <tr>
                    <td>Producer</td>
                    <td>:</td>
                    <td>{{ $movie["producer"] }}</td>
                </tr>
                <tr>
                    <td>Director</td>
                    <td>:</td>
                    <td>{{ $movie["director"] }}</td>
                </tr>
                <tr>
                    <td>Casts</td>
                    <td>:</td>
                    <td>{{ $movie["casts"] }}</td>
                </tr>
            </table>
            <div>
                <h3>Synopsis</h3>
                <p>{{ $movie["synopsis"] }}</p>
            </div>
            <a href="{{ url(Request::url()."/schedule") }}"><button class="btn btn-warning w-100 p-3 ">Beli Tiket</button></a>
        </div>
    </div>
@endsection