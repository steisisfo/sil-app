<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $creator = User::where('email', 'sari.konten@example.test')->first();

        $announcements = [
            [
                'title' => ['id' => 'Pendaftaran Asisten Kuliah STEI Semester Ganjil 2026/2027', 'en' => 'Registration for STEI Course Assistants Odd Semester 2026/2027'],
                'slug' => 'pendaftaran-asisten-kuliah-ganjil-2026',
                'content' => ['id' => 'Dibuka kesempatan bagi mahasiswa S1 tingkat akhir maupun S2 untuk melamar sebagai Asisten Kuliah dan Praktikum di lingkungan STEI ITB. Pendaftaran ditutup pada tanggal 10 Agustus 2026 secara online.'],
                'target_audience' => 'students',
                'valid_from' => '2026-07-20 00:00:00',
                'valid_until' => '2026-08-10 23:59:59',
                'attachment_file' => 'announcements/panduan_asisten_ganjil.pdf',
                'priority' => 'important',
                'status' => 'published',
                'is_pinned' => true,
                'author_id' => $creator ? $creator->id : null,
            ],
            [
                'title' => ['id' => 'Pengisian Evaluasi Perkuliahan Akhir (EPA) Semester Genap 2025/2026', 'en' => 'Final Course Evaluation (EPA) Filling Even Semester 2025/2026'],
                'slug' => 'pengisian-evaluasi-perkuliahan-akhir-genap',
                'content' => ['id' => 'Diimbau kepada seluruh mahasiswa aktif STEi ITB untuk segera mengisi kuesioner EPA melalui portal akademik SIX ITB sebelum pelaksanaan ujian akhir semester.'],
                'target_audience' => 'students',
                'valid_from' => '2026-06-01 00:00:00',
                'valid_until' => '2026-06-25 23:59:59',
                'attachment_file' => null,
                'priority' => 'normal',
                'status' => 'archived',
                'is_pinned' => false,
                'author_id' => $creator ? $creator->id : null,
            ],
            [
                'title' => ['id' => 'PENGUMUMAN DARURAT: Gangguan Jaringan Utama Router STEI', 'en' => 'EMERGENCY ANNOUNCEMENT: Main Network Router Disruption at STEI'],
                'slug' => 'darurat-gangguan-jaringan-utama-stei',
                'content' => ['id' => 'Diberitahukan bahwa sedang terjadi kerusakan perangkat router jaringan serat optik Labtek V dan VIII. Akses internet lokal dan e-learning STEI ITB akan terganggu hari ini hingga perbaikan teknis selesai dilakukan.'],
                'target_audience' => 'general',
                'valid_from' => '2026-07-20 08:00:00',
                'valid_until' => '2026-07-21 18:00:00',
                'attachment_file' => null,
                'priority' => 'urgent',
                'status' => 'published',
                'is_pinned' => true,
                'author_id' => $creator ? $creator->id : null,
            ],
        ];

        foreach ($announcements as $a) {
            Announcement::updateOrCreate(
                ['slug' => $a['slug']],
                $a
            );
        }
    }
}
