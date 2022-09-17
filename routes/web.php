<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CATATAN PENTING
|--------------------------------------------------------------------------
|
| MIDDLEWARE LIST
| auth -> Only logged in user
| verified -> auth & Email verified user
| guest -> Unregistered user
| role: admin,manager -> What role can access route
| 
*/

Route::get('/', [PageController::class,"index"]);
// ->middleware("role:admin,manager");

Route::get('/comingsoon', function () {
    return view('comingsoonpage');
});

Route::get("/movie/{movie:slug}", [PageController::class, "detailmovie"]);

Route::get("/find", [SearchController::class,"search"]);

Route::get("/user", [UserController::class,"index"])->middleware(["auth","verified"]);

// |----------------------|
// | LOGIN REGISTER       |
// |----------------------|
Route::view("/login","login")->name("login")->middleware("guest");
Route::view("/register","register")->name("register")->middleware("guest");

Route::post("/login",[VerificationController::class,"verifylogin"]);
Route::post("/register",[VerificationController::class,"verifyregister"]);

Route::post("/logout", [VerificationController::class,"logout"]);
// |----------------------|

// |----------------------|
// | EMAIL VERIFICATION   |
// |----------------------|
Route::prefix("/email")->group(function() {
    Route::view("/verify","verify.verify_email")->middleware("auth")->name("verification.notice");
    Route::get("/verify/resend", [VerificationController::class, "resend_email"])->middleware(["auth", "throttle:6,1"])->name("verification.send");
    Route::get("/verify/{id}/{hash}", [VerificationController::class, "verify"])->middleware(['auth','signed'])->name('verification.verify');
});
// |----------------------|

// |----------------------|
// | USER                 |
// |----------------------|
Route::prefix("/user")->group(function() {
    Route::get("/", [UserController::class,"index"])->middleware(["auth","verified"]);
    Route::get("/history", [UserController::class,"history"])->middleware(["auth","verified"]);
});
// |----------------------|

// BUAT DEBUG / TESTING TAMPILAN DSB, PAKAI ROUTE TEST SAJA.
Route::view("/test","admin.dashboard");
