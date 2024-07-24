<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\SuperAdminController;

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
    // Data Pegawai
    Route::get("/admin/data-pegawai", [
        AdminController::class,
        "showAllUser",
    ])->name("admin-pegawai-index");
    // Data Pengajuan
    Route::get("/admin/data-pengajuan", [
        AdminController::class,
        "showUserReq",
    ])->name("admin-pengajuan-index");
});

Route::middleware(["auth", "role:user"])->group(function () {
    // Dashboard
    Route::get("/user/dashboard", function () {
        return view("pages.user.index");
    })->name("user-dashboard-index");
    // Pengajuan
    Route::get("/user/pengajuan", [PengajuanController::class, "index"])->name(
        "user-pengajuan-index"
    );

    Route::get("/user/pengajuan/tambah", [
        PengajuanController::class,
        "create",
    ])->name("user-pengajuan-create");

    Route::post("/user/pengajuan/tambah", [
        PengajuanController::class,
        "store",
    ])->name("user-pengajuan-store");
});

Route::middleware(["auth", "role:superadmin"])->group(function () {
    Route::get("/superadmin/dashboard", [
        SuperAdminController::class,
        "index",
    ])->name("sa-pengajuan-idx");
    Route::post("/pengajuan/{id}/accept", [
        SuperAdminController::class,
        "accept",
    ])->name("sa-pengajuan-acc");
    Route::post("/pengajuan/{id}/reject", [
        SuperAdminController::class,
        "reject",
    ])->name("sa-pengajuan-tlk");
});
