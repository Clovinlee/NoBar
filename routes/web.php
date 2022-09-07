<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class,"index"]);

Route::get('/comingsoon', function () {
    return view('comingsoonpage');
});

Route::get("/movie/{slug}", function(){
    return view("detailmovie");
});

Route::get("/find", [SearchController::class,"search"]);

Route::get("/user", [UserController::class,"index"]);

