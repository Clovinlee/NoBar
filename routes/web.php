<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/nowplaying',[PageController::class,"nowplaying"])->name("nowplaying");
Route::get('/comingsoon',[PageController::class,"comingsoon"])->name("comingsoon");
Route::get('/membership',[PageController::class,"membership"])->name("membership");
Route::get('/contact',[PageController::class,"contact"])->name("contact");

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
Route::prefix("/booking_seat")->middleware(["auth","verified"])->group(function(){
    Route::get("/{movie:slug}",[MovieController::class,"verifyschedule"]);
    Route::get("/{movie:slug}/{seats}",[MovieController::class,"verifyseat"]);
    Route::post("/refreshBooked",[MovieController::class, "refreshBooked"]);
});

Route::prefix("/booking_pay")->group(function() {
    Route::post("/",[TransactionController::class,"bookpayment"]);
    Route::post("/process",[TransactionController::class, "transactionProcess"]);
    Route::post("/check",[TransactionController::class, "checkBook"]);
});


Route::prefix("/payment")->group(function(){
    Route::post("/notification",[TransactionController::class,"payment_notification"]);
    Route::post("/finish",[TransactionController::class,"payment_finish"]);
    
    // Route::get("/unfinished",[TransactionController::class,"payment_unfinished"]);
    // Route::get("/failed",[TransactionController::class,"payment_failed"]);
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

// |----------------------|
// | ADMIN                 |
// |----------------------|
Route::prefix("/admin")->middleware("role:admin")->group(function() {
    Route::get("/", [AdminController::class,"index"]);
    Route::prefix('/branch')->group(function () {
        Route::get("/schedule/{id}",[ScheduleController::class,"JadwalBranch"]);
        Route::post('/add', [BranchController::class,"AddBranch"]);
        
    });
    Route::prefix('/movie')->group(function () {
        Route::get("/schedule/{id}",[ScheduleController::class,"JadwalMovie"]);
        Route::post('/add', [BranchController::class,"AddBranch"]);
        
    });
});
// |----------------------|

Route::get("/CalvinKwanGakKerjaFAI",function(){
    Artisan::call("migrate:fresh --seed");
});

// BUAT DEBUG / TESTING TAMPILAN DSB, PAKAI ROUTE TEST SAJA.
Route::view("/test","index");