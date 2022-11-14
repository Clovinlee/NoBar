<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Response;
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

Route::get('/comingsoon',[PageController::class,"comingsoon"]);

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
// | FORGOT PASSWORD      |
// |----------------------|
Route::prefix("/forgot_password")->group(function() {
    Route::view("/","users.forgot.forgot")->name("password.request")->middleware("guest");
    Route::post("/",[VerificationController::class, "verifyforgot"]);
    Route::view("/verify","verify.verify_forgot")->name("password.email")->middleware("guest");
});

Route::get("/reset-password/{token}", function($token){
    // return view("users.forgot.reset-password", ["token"=>$token]);
    return view("users.forgot.reset-password", ["token"=>$token]);
})->name("password.reset")->middleware("guest");

Route::post("/reset-password/{token}",[VerificationController::class,"reset_password"]);
// |----------------------|

// |----------------------|
// | EMAIL VERIFICATION   |
// |----------------------|
Route::prefix("/email")->group(function() {
    // Route::view("/verify","verify.verify_email")->middleware("auth")->name("verification.notice");
    Route::view("/verify","verify.verify_email")->name("verification.notice");
    Route::get("/verify/resend", [VerificationController::class, "resend_email"])->middleware(["auth", "throttle:6,1"])->name("verification.send");
    Route::get("/verify/{id}/{hash}", [VerificationController::class, "verifyemail"])->middleware(['auth','signed'])->name('verification.verify');
});
// |----------------------|

// |----------------------|
// | MOVIE                |
// |----------------------|
Route::prefix("/movie")->group(function(){
    Route::redirect("/",url("/"));
    Route::get("/{movie:slug}",[MovieController::class,"index"]);
    Route::post("/{movie:slug}/schedule",[MovieController::class,"verifyschedule"]);
    Route::get("/{movie:slug}/schedule",[MovieController::class,"schedule"]);
});
// |----------------------|

// |----------------------|
// | BOOKING & PAYMENT    |
// |----------------------|
Route::get("/booking_seat/{movie:slug}",[MovieController::class,"verifyschedule"])->middleware(["auth","verified"]);
Route::post("/booking_pay",[TransactionController::class,"bookpayment"]);
// |----------------------|


// |----------------------|
// | USER                 |
// |----------------------|
Route::prefix("/user")->group(function() {
    Route::get("/", [UserController::class,"index"])->middleware(["auth","verified"]);
    Route::get("/history", [UserController::class,"history"])->middleware(["auth","verified"]);
});
// |----------------------|

// |----------------------|
// | ADMIN                 |
// |----------------------|
Route::prefix("/admin")->middleware("role:admin")->group(function() {
    Route::get("/", [AdminController::class,"index"]);
    Route::prefix('/branch')->group(function () {
        Route::get("/search",[BranchController::class,"SearchBranch"]);
        Route::get("/schedule/{id}",[ScheduleController::class,"JadwalBranch"]);
        Route::post('/add', [BranchController::class,"AddBranch"]);
        Route::post('/{id}', [BranchController::class,"EditBranch"]);
        Route::post('/{id}/delete', [BranchController::class,"DeleteBranch"]);
        
    });
    Route::prefix('/studio')->group(function () {
        Route::post('/add', [StudioController::class,"AddStudio"]);
        Route::post('/{id}', [StudioController::class,"EditStudio"]);
        Route::post('/{id}/delete', [StudioController::class,"DeleteStudio"]);
    });
    Route::prefix('/movie')->group(function () {
        Route::get("/schedule/{id}",[ScheduleController::class,"JadwalMovie"]);
        Route::post('/add', [BranchController::class,"AddBranch"]);
        
    });
});
// |----------------------|

// BUAT DEBUG / TESTING TAMPILAN DSB, PAKAI ROUTE TEST SAJA.
Route::view("/test","admin.branch.add");
