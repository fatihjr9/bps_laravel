<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAllUser()
    {
        $user = User::where("role", "user")->get();
        return view("pages.admin.pegawai.index", compact("user"));
    }

    public function showUserReq()
    {
        $data = Pengajuan::with("users")->get();
        return view("pages.admin.pengajuan.index", compact("data"));
    }
}
