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
                'name' => 'S1 Teknik Informatika',
                'degree_level' => 'S1',
                'description' => 'Program Studi Sarjana Teknik Informatika STEI ITB menitikberatkan pada pengembangan perangkat lunak, algoritma, dan rekayasa komputasi.',
                'curriculum_details' => 'Kurikulum 2020 mencakup Matematika Diskrit, Struktur Data, Algoritma, Rekayasa Perangkat Lunak, Kecerdasan Buatan, dan Tugas Akhir.',
                'learning_outcomes' => 'Lulusan memiliki kemampuan merancang, mengimplementasikan, dan mengevaluasi sistem berbasis komputer dengan keahlian pemecahan masalah yang kuat.',
                'accreditation' => 'Unggul - LAMSAMA & Terakreditasi Internasional ABET',
                'degree_title' => 'S.T.',
                'study_duration' => '4 Tahun (8 Semester)',
                'career_prospects' => 'Software Engineer, Data Scientist, Systems Analyst, IT Consultant, Tech Entrepreneur.',
                'contact_info' => 'inf@stei.itb.ac.id',
            ],
            [
                'name' => 'S1 Sistem dan Teknologi Informasi',
                'degree_level' => 'S1',
                'description' => 'Program Studi Sarjana STI STEI ITB berfokus pada integrasi teknologi informasi dengan proses bisnis organisasi.',
                'curriculum_details' => 'Mencakup Manajemen Basis Data, Desain Sistem Informasi, Tata Kelola IT, Keamanan Informasi, Arsitektur Enterprise.',
                'learning_outcomes' => 'Lulusan mampu menyelaraskan strategi TI dengan tujuan organisasi serta merancang solusi TI yang bernilai strategis.',
                'accreditation' => 'Unggul - LAMSAMA & Terakreditasi Internasional JABEE',
                'degree_title' => 'S.T.',
                'study_duration' => '4 Tahun (8 Semester)',
                'career_prospects' => 'IT Project Manager, Business Analyst, Information Security Officer, IT Auditor.',
                'contact_info' => 'sti@stei.itb.ac.id',
            ],
            [
                'name' => 'S1 Teknik Elektro',
                'degree_level' => 'S1',
                'description' => 'Program Studi Sarjana Teknik Elektro mempelajari sistem kelistrikan, elektronika, kontrol otomatis, dan sistem daya.',
                'curriculum_details' => 'Mencakup Rangkaian Elektrik, Elektronika, Sistem Kendali, Mikroprosesor, Sistem Tenaga Listrik.',
                'learning_outcomes' => 'Lulusan mampu merancang sistem perangkat keras listrik dan elektronik serta mengaplikasikan teori kontrol industri.',
                'accreditation' => 'Unggul - IABEE',
                'degree_title' => 'S.T.',
                'study_duration' => '4 Tahun (8 Semester)',
                'career_prospects' => 'Electrical Engineer, Control System Engineer, Power Plant Administrator, Automation Specialist.',
                'contact_info' => 'ee@stei.itb.ac.id',
            ],
            [
                'name' => 'S2 Informatika',
                'degree_level' => 'S2',
                'description' => 'Program Magister Informatika ditujukan bagi pendalaman riset di bidang ilmu komputer lanjutan.',
                'curriculum_details' => 'Mencakup Metodologi Riset, Pembelajaran Mesin Lanjutan, Kriptografi Lanjutan, Komputasi Awan, Tesis.',
                'learning_outcomes' => 'Lulusan mampu menghasilkan karya ilmiah berkualitas internasional dan memimpin inovasi riset komputer.',
                'accreditation' => 'Unggul',
                'degree_title' => 'M.T.',
                'study_duration' => '2 Tahun (4 Semester)',
                'career_prospects' => 'Research & Development Specialist, AI Engineer, Academician (Lecturer), Senior Software Architect.',
                'contact_info' => 'master-inf@stei.itb.ac.id',
            ],
            [
                'name' => 'S3 Teknik Elektro dan Informatika',
                'degree_level' => 'S3',
                'description' => 'Program Doktor STEI ITB mempersiapkan peneliti mandiri yang mampu memberikan kontribusi orisinal bagi pengembangan ilmu pengetahuan.',
                'curriculum_details' => 'Fokus penuh pada penelitian mandiri, ujian kualifikasi, publikasi jurnal internasional bereputasi, dan disertasi.',
                'learning_outcomes' => 'Lulusan mampu menemukan teori baru atau solusi teknologi orisinal melalui riset interdisipliner.',
                'accreditation' => 'Unggul',
                'degree_title' => 'Dr.',
                'study_duration' => '3-5 Tahun',
                'career_prospects' => 'Professor, Senior Researcher, Principal Consultant, Research Director.',
                'contact_info' => 'phd@stei.itb.ac.id',
            ],
        ];

        foreach ($programs as $prog) {
            StudyProgram::updateOrCreate(
                ['name' => $prog['name']],
                $prog
            );
        }
    }
}
