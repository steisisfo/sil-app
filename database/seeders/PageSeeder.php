<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'andi.admin@example.test')->first();

        $pages = [
            [
                'title' => 'Sejarah STEI ITB',
                'slug' => 'sejarah-stei',
                'content' => 'Sekolah Teknik Elektro dan Informatika (STEI) ITB didirikan pada tanggal 29 Agustus 2005. STEI merupakan penggabungan dari Departemen Teknik Elektro dan Departemen Teknik Informatika yang memiliki sejarah panjang sejak berdirinya ITB.',
                'image' => 'pages/sejarah.jpg',
                'status' => 'published',
                'author_id' => $admin ? $admin->id : null,
                'published_at' => now(),
            ],
            [
                'title' => 'Visi dan Misi STEI ITB',
                'slug' => 'visi-misi',
                'content' => 'Visi: Menjadi lembaga pendidikan tinggi dan riset kelas dunia di bidang Teknik Elektro dan Informatika. Misi: Menyelenggarakan pendidikan tinggi unggul, melakukan riset transformatif, dan mengabdikan ilmu bagi kemajuan bangsa.',
                'image' => 'pages/visi-misi.jpg',
                'status' => 'published',
                'author_id' => $admin ? $admin->id : null,
                'published_at' => now(),
            ],
            [
                'title' => 'Struktur Organisasi',
                'slug' => 'struktur-organisasi',
                'content' => 'STEI ITB dipimpin oleh seorang Dekan didampingi oleh Wakil Dekan Bidang Akademik dan Wakil Dekan Bidang Sumber Daya. Manajemen operasional didukung oleh jajaran Koordinator Program Studi dan Kepala Unit Penjaminan Mutu.',
                'image' => 'pages/struktur.jpg',
                'status' => 'published',
                'author_id' => $admin ? $admin->id : null,
                'published_at' => now(),
            ],
        ];

        foreach ($pages as $p) {
            Page::updateOrCreate(
                ['slug' => $p['slug']],
                $p
            );
        }
    }
}
