<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Membuat kolom `news.image` menjadi nullable.
 *
 * Alasan: Form NewsForm sudah menghapus ->required() pada FileUpload('image')
 * sehingga admin dapat menyimpan berita tanpa gambar. Namun kolom di DB
 * masih NOT NULL yang akan menyebabkan DB constraint violation.
 * Perbaikan paling kecil: alter kolom menjadi nullable tanpa mengubah
 * data yang sudah ada maupun logika form lainnya.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change();
        });
    }
};
