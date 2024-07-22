<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("pengajuans", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("judul");
            $table->string("tujuan");
            $table->string("deskripsi");
            $table->integer("lama_hari");
            $table->integer("akomodasi_perorangan");
            $table->integer("akomodasi_transportasi");
            $table->integer("akomodasi_penginapan");
            $table->integer("akomodasi_lainnya")->default("-");
            $table->date("tgl_mulai");
            $table->date("tgl_selesai");
            $table->string("status")->default("Menunggu Persetujuan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("pengajuans");
    }
};
