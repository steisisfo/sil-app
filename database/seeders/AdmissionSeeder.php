<?php

namespace Database\Seeders;

use App\Models\Admission;
use Illuminate\Database\Seeder;

class AdmissionSeeder extends Seeder
{
    public function run(): void
    {
        $admissions = [
            [
                'selection_path' => 'Seleksi Nasional Berdasarkan Prestasi (SNBP)',
                'degree_level' => 'S1',
                'admission_requirements' => '1. Lulusan SMA/MA/SMK tahun berjalan yang memiliki prestasi unggul.'."\n".
                                            '2. Memiliki NIK dan NISN yang terdaftar di PDSS.'."\n".
                                            '3. Mengunggah nilai rapor semester 1 s.d. 5.',
                'start_date' => '2026-01-08',
                'end_date' => '2026-02-15',
                'tuition_fee' => 12500000.00,
                'capacity' => 150,
                'external_link' => 'https://snpmb.bppp.kemdikbud.go.id/',
                'faq' => [
                    ['q' => 'Apakah jalur SNBP memerlukan ujian tertulis?', 'a' => 'Tidak, seleksi hanya berdasarkan nilai rapor dan prestasi akademik/non-akademik.'],
                    ['q' => 'Berapa persen kuota SNBP di STEI ITB?', 'a' => 'Kuota untuk jalur SNBP adalah minimal 20% dari total daya tampung.'],
                ],
                'contact_info' => 'snbp@itb.ac.id',
                'status' => 'active',
            ],
            [
                'selection_path' => 'Seleksi Nasional Berdasarkan Tes (SNBT)',
                'degree_level' => 'S1',
                'admission_requirements' => '1. Lulusan SMA/MA/SMK tahun berjalan atau paket C dengan umur maksimal 22 tahun.'."\n".
                                            '2. Memiliki nilai UTBK-SNBT tahun berjalan.'."\n".
                                            '3. Melakukan registrasi akun SNPMB.',
                'start_date' => '2026-03-21',
                'end_date' => '2026-04-19',
                'tuition_fee' => 12500000.00,
                'capacity' => 200,
                'external_link' => 'https://snpmb.bppp.kemdikbud.go.id/',
                'faq' => [
                    ['q' => 'Di mana lokasi ujian UTBK-SNBT?', 'a' => 'Ujian dilaksanakan di pusat-pusat UTBK yang telah dipilih oleh peserta saat mendaftar.'],
                ],
                'contact_info' => 'snbt@itb.ac.id',
                'status' => 'active',
            ],
            [
                'selection_path' => 'Seleksi Mandiri ITB (SM-ITB)',
                'degree_level' => 'S1',
                'admission_requirements' => '1. Lulusan SMA/MA/SMK tahun berjalan atau maksimal 2 tahun sebelumnya.'."\n".
                                            '2. Memiliki nilai UTBK-SNBT dan nilai rapor.'."\n".
                                            '3. Tidak buta warna untuk program studi tertentu di STEI.',
                'start_date' => '2026-05-24',
                'end_date' => '2026-06-20',
                'tuition_fee' => 25000000.00,
                'capacity' => 100,
                'external_link' => 'https://admission.itb.ac.id/',
                'faq' => [
                    ['q' => 'Apakah ada uang pangkal untuk SM-ITB?', 'a' => 'Ya, jalur seleksi mandiri mengenakan dana pengembangan institusi sesuai ketentuan ITB.'],
                ],
                'contact_info' => 'seleksimandiri@itb.ac.id',
                'status' => 'active',
            ],
        ];

        foreach ($admissions as $a) {
            Admission::updateOrCreate(
                ['selection_path' => $a['selection_path'], 'degree_level' => $a['degree_level']],
                $a
            );
        }
    }
}
