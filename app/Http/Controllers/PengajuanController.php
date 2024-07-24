<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with("users")->get();
        return view("pages.user.pengajuan.index", compact("pengajuans"));
    }

    public function create()
    {
        $user = User::where("role", "user")->get();
        return view("pages.user.pengajuan.create", compact("user"));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "judul" => "required",
            "tujuan" => "required",
            "deskripsi" => "required",
            "lama_hari" => "required|integer",
            "user_ids" => "required|array",
            "akomodasi_perorangan" => "required|integer",
            "akomodasi_transportasi" => "required|integer",
            "akomodasi_penginapan" => "required|integer",
            "akomodasi_lainnya" => "nullable|integer",
            "tgl_mulai" => "required|date",
            "tgl_selesai" => "required|date",
        ]);
        $pengajuan = Pengajuan::create($data);

        $pengajuan->users()->attach($request->user_ids);

        return redirect()
            ->route("user-pengajuan-index")
            ->with("success", "Pengajuan berhasil ditambahkan.");
    }
}
