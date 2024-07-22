<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "judul",
        "tujuan",
        "deskripsi",
        "lama_hari",
        "akomodasi_perorangan",
        "akomodasi_transportasi",
        "akomodasi_penginapan",
        "akomodasi_lainnya",
        "tgl_mulai",
        "tgl_selesai",
        "status",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
