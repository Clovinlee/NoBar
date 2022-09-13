@extends('master.masterlayout')
@section("subtitle","Spiderman The SpiderVerse")

@section("navbar")
<x-navbar></x-navbar>
@stop

@section("navbar2")
<x-fixednavbar></x-fixednavbar>
@stop

@section('body')
<div class="container py-4">
    <h2>Now Playing</h2>
    <div class="row mt-3">
        <div class="col-12 col-md-4">
          <x-lightbox id="imgSpider" img="spiderman.jpg"> {{ $movie["judul"] }} </x-lightbox>
        </div>

        <div class="col-12 col-md-8">
            <h3>{{ $movie["judul"] }}</h3>
            <table class="table table-striped">
                <tr>
                    <td>Genre</td>
                    <td>:</td>
                    <td>Action, Comedy, Romance</td>
                </tr>
                <tr>
                    <td>Produser</td>
                    <td>:</td>
                    <td>ChrisFilm</td>
                </tr>
                <tr>
                    <td>Sutradara</td>
                    <td>:</td>
                    <td>Chrisanto</td>
                </tr>
                <tr>
                    <td>Casts</td>
                    <td>:</td>
                    <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio fugit ipsum cumque illum!
                        Nisi repellendus harum repudiandae asperiores! A odio quibusdam cupiditate ratione nam corporis
                        itaque necessitatibus reprehenderit sunt beatae!</td>
                </tr>
            </table>
            <div>
                <h3>Sinopsis</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa delectus, optio minima aliquam
                    molestias aut adipisci. Pariatur rem perspiciatis ipsum, dolore, unde ipsa sint perferendis quam
                    facilis tempore expedita ipsam.Aperiam ab temporibus doloribus, dolorum assumenda a dicta. Cum
                    maxime sequi iusto maiores. Dolorum dolores ullam porro obcaecati qui omnis fuga placeat officia
                    consectetur laudantium, natus, ipsum distinctio dolor libero.</p>
            </div>
            <form action="" method="post">
                @csrf
                <button class="btn btn-warning w-100 p-3 ">
                    Beli Tiket
                </button>
            </form>
        </div>
    </div>
@endsection