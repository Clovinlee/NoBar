<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        return view("homepage",["listMovie" => Movie::all()]);
    }

    public function detailmovie(Movie $movie){
        return view("detailmovie",["movie" => $movie]);
    }
}
