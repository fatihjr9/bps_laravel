<?php

use Illuminate\Support\Facades\Route;

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
Route::get("/auth/login", function () {
    return view("pages.auth.login");
})->name("login");
Route::get("/auth/register", function () {
    return view("pages.auth.register");
})->name("register");

Route::get("/", function () {
    return view("welcome");
});
