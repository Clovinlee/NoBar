<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
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

Route::get("/user", [UserController::class,"index"])->middleware(["auth","verified"]);

// LOGIN REGISTER LOGOUT
Route::view("/login","login")->name("login")->middleware("guest");
Route::view("/register","register")->name("register")->middleware("guest");

Route::post("/login",[VerificationController::class,"verifylogin"]);
Route::post("/register",[VerificationController::class,"verifyregister"]);

Route::post("/logout", [VerificationController::class,"logout"]);
///////////////////////

// EMAIL VERIFICATION
Route::prefix("/email")->group(function() {
    Route::view("/verify","verify.verify_email")->middleware("auth")->name("verification.notice");
    Route::get("/verify/resend", [VerificationController::class, "resend_email"])->middleware(["auth", "throttle:6,1"])->name("verification.send");
    Route::get("/verify/{id}/{hash}", [VerificationController::class, "verify"])->middleware(['auth','signed'])->name('verification.verify');
});
// Route::post("/email/send", [VerificationController::class, "send"])->middleware(["auth","verified"]);
///////////////////////
