<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Kembalikan kolom news.image menjadi NOT NULL.
 *
 * Alasan: PRD Layanan 7 baris 178 mewajibkan setiap berita memiliki
 * minimal 1 gambar utama. Migration sebelumnya (2026_07_21_030000)
 * secara keliru membuat kolom nullable. Koreksi ini aman karena
 * tinker telah memverifikasi null_count = 0 pada seluruh 3 record
 * yang ada di database sebelum migration ini dijalankan.
 *
 * Form NewsForm sudah disesuaikan: ->required(fn => $op === "create")
 * sehingga saat edit, gambar lama dipertahankan tanpa upload ulang.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }
};
