<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth
Route::get("/login", [AuthController::class, "showLoginForm"])
    ->name("login-index")
    ->middleware("guest");
Route::post("/login", [AuthController::class, "login"])
    ->name("login")
    ->middleware("guest");

Route::get("/register", [AuthController::class, "showRegistrationForm"])
    ->name("register-index")
    ->middleware("guest");
Route::post("/register", [AuthController::class, "register"])
    ->name("register")
    ->middleware("guest");

Route::post("/logout", [AuthController::class, "logout"])->name("logout");

Route::get("/", function () {
    return view("welcome");
});

Route::middleware(["auth", "role:admin"])->group(function () {
    Route::get("/admin/dashboard", function () {
        return view("pages.admin.index");
    });
});

Route::middleware(["auth", "role:user"])->group(function () {
    Route::get("/user/dashboard", function () {
        return view("pages.user.index");
    });
});

Route::middleware(["auth", "role:superadmin"])->group(function () {
    Route::get("/superadmin/dashboard", function () {
        return view("pages.superadmin.index");
    });
});
