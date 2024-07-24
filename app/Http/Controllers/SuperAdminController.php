<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with("users")->get();
        return view("pages.superadmin.index", compact("pengajuans"));
    }

    public function accept($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = "Diterima";
        $pengajuan->save();

        return redirect()
            ->route("sa-pengajuan-idx")
            ->with("success", "Pengajuan diterima");
    }

    public function reject($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = "Ditolak";
        $pengajuan->save();

        return redirect()
            ->route("sa-pengajuan-idx")
            ->with("success", "Pengajuan ditolak");
    }
}
