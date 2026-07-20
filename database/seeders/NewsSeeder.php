<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $creator = User::where('email', 'sari.konten@example.test')->first();

        $newsData = [
            [
                'title' => 'STEI ITB Selenggarakan Konferensi Internasional ICICI 2026',
                'slug' => 'stei-itb-selenggarakan-icici-2026',
                'content' => 'Sekolah Teknik Elektro dan Informatika ITB secara resmi membuka International Conference on Information Technology and Electrical Engineering (ICICI) 2026 di Bandung. Konferensi ini dihadiri oleh ratusan peneliti dari berbagai negara untuk mendiskusikan inovasi terbaru sistem cerdas.',
                'image' => 'news/icici-2026.jpg',
                'category' => 'research',
                'tags' => 'konferensi,riset,teknologi',
                'author_id' => $creator ? $creator->id : null,
                'status' => 'published',
                'published_at' => now(),
                'views_count' => 124,
            ],
            [
                'title' => 'Mahasiswa STEI Raih Juara Pertama Gemastik XIX Bidang Desain UX',
                'slug' => 'mahasiswa-stei-juara-gemastik-2026',
                'content' => 'Tim mahasiswa dari STEI ITB berhasil menyabet medali emas pada kompetisi nasional Gemastik XIX dalam divisi UX Design. Karya mereka yang bertajuk "Sistem Aksesibilitas Transportasi Publik Ramah Disabilitas" memukau dewan juri.',
                'image' => 'news/gemastik-2026.jpg',
                'category' => 'student_affairs',
                'tags' => 'prestasi,mahasiswa,gemastik',
                'author_id' => $creator ? $creator->id : null,
                'status' => 'published',
                'published_at' => now()->subDays(2),
                'views_count' => 310,
            ],
            [
                'title' => 'Pembaruan Kurikulum Berbasis Outcome-Based Education (OBE) STEI ITB',
                'slug' => 'pembaruan-kurikulum-obe-stei',
                'content' => 'Menghadapi tuntutan era industri 5.0, STEI ITB memperbarui kurikulum sarjana dengan memperkuat pendekatan Outcome-Based Education (OBE). Langkah ini mematangkan profil lulusan sesuai standar akreditasi internasional.',
                'image' => 'news/kurikulum-obe.jpg',
                'category' => 'academic',
                'tags' => 'kurikulum,akademik,obe',
                'author_id' => $creator ? $creator->id : null,
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'views_count' => 89,
            ],
        ];

        foreach ($newsData as $n) {
            News::updateOrCreate(
                ['slug' => $n['slug']],
                $n
            );
        }
    }
}
