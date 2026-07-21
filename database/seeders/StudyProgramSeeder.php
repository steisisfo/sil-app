<?php

namespace Database\Seeders;

use App\Models\StudyProgram;
use Illuminate\Database\Seeder;

class StudyProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'name' => ['id' => 'S1 Teknik Informatika', 'en' => 'Bachelor in Informatics'],
                'degree_level' => 'S1',
                'description' => ['id' => 'Program Studi Sarjana Teknik Informatika STEI ITB menitikberatkan pada pengembangan perangkat lunak, algoritma, dan rekayasa komputasi.'],
                'curriculum_details' => ['id' => 'Kurikulum 2020 mencakup Matematika Diskrit, Struktur Data, Algoritma, Rekayasa Perangkat Lunak, Kecerdasan Buatan, dan Tugas Akhir.'],
                'learning_outcomes' => ['id' => 'Lulusan memiliki kemampuan merancang, mengimplementasikan, dan mengevaluasi sistem berbasis komputer dengan keahlian pemecahan masalah yang kuat.'],
                'accreditation' => ['id' => 'Unggul - LAMSAMA & Terakreditasi Internasional ABET', 'en' => 'Excellent - LAMSAMA & Internationally Accredited ABET'],
                'degree_title' => ['id' => 'S.T.', 'en' => 'B.Eng.'],
                'study_duration' => '4 Tahun (8 Semester)',
                'career_prospects' => ['id' => 'Software Engineer, Data Scientist, Systems Analyst, IT Consultant, Tech Entrepreneur.'],
                'contact_info' => 'inf@stei.itb.ac.id',
            ],
            [
                'name' => ['id' => 'S1 Sistem dan Teknologi Informasi', 'en' => 'Bachelor in Information System and Technology'],
                'degree_level' => 'S1',
                'description' => ['id' => 'Program Studi Sarjana STI STEI ITB berfokus pada integrasi teknologi informasi dengan proses bisnis organisasi.'],
                'curriculum_details' => ['id' => 'Mencakup Manajemen Basis Data, Desain Sistem Informasi, Tata Kelola IT, Keamanan Informasi, Arsitektur Enterprise.'],
                'learning_outcomes' => ['id' => 'Lulusan mampu menyelaraskan strategi TI dengan tujuan organisasi serta merancang solusi TI yang bernilai strategis.'],
                'accreditation' => ['id' => 'Unggul - LAMSAMA & Terakreditasi Internasional JABEE', 'en' => 'Excellent - LAMSAMA & Internationally Accredited JABEE'],
                'degree_title' => ['id' => 'S.T.', 'en' => 'B.Eng.'],
                'study_duration' => '4 Tahun (8 Semester)',
                'career_prospects' => ['id' => 'IT Project Manager, Business Analyst, Information Security Officer, IT Auditor.'],
                'contact_info' => 'sti@stei.itb.ac.id',
            ],
            [
                'name' => ['id' => 'S1 Teknik Elektro', 'en' => 'Bachelor in Electrical Engineering'],
                'degree_level' => 'S1',
                'description' => ['id' => 'Program Studi Sarjana Teknik Elektro mempelajari sistem kelistrikan, elektronika, kontrol otomatis, dan sistem daya.'],
                'curriculum_details' => ['id' => 'Mencakup Rangkaian Elektrik, Elektronika, Sistem Kendali, Mikroprosesor, Sistem Tenaga Listrik.'],
                'learning_outcomes' => ['id' => 'Lulusan mampu merancang sistem perangkat keras listrik dan elektronik serta mengaplikasikan teori kontrol industri.'],
                'accreditation' => ['id' => 'Unggul - IABEE', 'en' => 'Excellent - IABEE'],
                'degree_title' => ['id' => 'S.T.', 'en' => 'B.Eng.'],
                'study_duration' => '4 Tahun (8 Semester)',
                'career_prospects' => ['id' => 'Electrical Engineer, Control System Engineer, Power Plant Administrator, Automation Specialist.'],
                'contact_info' => 'ee@stei.itb.ac.id',
            ],
            [
                'name' => ['id' => 'S2 Informatika', 'en' => 'Master in Informatics'],
                'degree_level' => 'S2',
                'description' => ['id' => 'Program Magister Informatika ditujukan bagi pendalaman riset di bidang ilmu komputer lanjutan.'],
                'curriculum_details' => ['id' => 'Mencakup Metodologi Riset, Pembelajaran Mesin Lanjutan, Kriptografi Lanjutan, Komputasi Awan, Tesis.'],
                'learning_outcomes' => ['id' => 'Lulusan mampu menghasilkan karya ilmiah berkualitas internasional dan memimpin inovasi riset komputer.'],
                'accreditation' => ['id' => 'Unggul', 'en' => 'Excellent'],
                'degree_title' => ['id' => 'M.T.', 'en' => 'M.Eng.'],
                'study_duration' => '2 Tahun (4 Semester)',
                'career_prospects' => ['id' => 'Research & Development Specialist, AI Engineer, Academician (Lecturer), Senior Software Architect.'],
                'contact_info' => 'master-inf@stei.itb.ac.id',
            ],
            [
                'name' => ['id' => 'S3 Teknik Elektro dan Informatika', 'en' => 'Doctoral in Electrical Engineering and Informatics'],
                'degree_level' => 'S3',
                'description' => ['id' => 'Program Doktor STEI ITB mempersiapkan peneliti mandiri yang mampu memberikan kontribusi orisinal bagi pengembangan ilmu pengetahuan.'],
                'curriculum_details' => ['id' => 'Fokus penuh pada penelitian mandiri, ujian kualifikasi, publikasi jurnal internasional bereputasi, dan disertasi.'],
                'learning_outcomes' => ['id' => 'Lulusan mampu menemukan teori baru atau solusi teknologi orisinal melalui riset interdisipliner.'],
                'accreditation' => ['id' => 'Unggul', 'en' => 'Excellent'],
                'degree_title' => ['id' => 'Dr.', 'en' => 'Dr.'],
                'study_duration' => '3-5 Tahun',
                'career_prospects' => ['id' => 'Professor, Senior Researcher, Principal Consultant, Research Director.'],
                'contact_info' => 'phd@stei.itb.ac.id',
            ],
        ];

        foreach ($programs as $prog) {
            StudyProgram::updateOrCreate(
                ['contact_info' => $prog['contact_info']],
                $prog
            );
        }
    }
}
