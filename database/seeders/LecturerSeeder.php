<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use App\Models\ResearchGroup;
use App\Models\StudyProgram;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil data master program studi
        $spIf = StudyProgram::where('name', 'S1 Teknik Informatika')->first();
        $spSti = StudyProgram::where('name', 'S1 Sistem dan Teknologi Informasi')->first();
        $spEl = StudyProgram::where('name', 'S1 Teknik Elektro')->first();
        $spS2If = StudyProgram::where('name', 'S2 Informatika')->first();

        // Ambil data master kelompok keahlian
        $rgRpl = ResearchGroup::where('name', 'Kelompok Keahlian Rekayasa Perangkat Lunak dan Data')->first();
        $rgSi = ResearchGroup::where('name', 'Kelompok Keahlian Sistem Informasi')->first();
        $rgTk = ResearchGroup::where('name', 'Kelompok Keahlian Teknik Komputer')->first();
        $rgTel = ResearchGroup::where('name', 'Kelompok Keahlian Telekomunikasi')->first();
        $rgKendali = ResearchGroup::where('name', 'Kelompok Keahlian Kontrol dan Sistem Cerdas')->first();

        $lecturers = [
            [
                'name' => 'Prof. Dr. Ir. Tutun Juhana, M.T.',
                'nip' => '197103231997021001',
                'nidn' => '0023037102',
                'functional_position' => 'Guru Besar / Professor',
                'study_program_id' => $spEl->id,
                'research_group_id' => $rgTel->id,
                'research_fields' => 'Computer Networks, Telecommunication Systems, Internet of Things',
                'email' => 'tutun@stei.itb.ac.id',
                'photo' => 'lecturers/tutun.jpg',
                'scopus_link' => 'https://www.scopus.com/authid/detail.uri?authorId=57194012300',
                'google_scholar_link' => 'https://scholar.google.com/citations?user=xyz123',
                'sinta_link' => 'https://sinta.kemdikbud.go.id/authors/detail?id=6011',
                'lab_managed' => 'Laboratorium Telekomunikasi Lanjut',
                'status' => 'active',
            ],
            [
                'name' => 'Dr. Ir. Rinaldi Munir, M.T.',
                'nip' => '196610151992031002',
                'nidn' => '0015106603',
                'functional_position' => 'Lektor Kepala',
                'study_program_id' => $spIf->id,
                'research_group_id' => $rgRpl->id,
                'research_fields' => 'Cryptography, Image Processing, Discrete Mathematics',
                'email' => 'rinaldi@stei.itb.ac.id',
                'photo' => 'lecturers/rinaldi.jpg',
                'scopus_link' => 'https://www.scopus.com/authid/detail.uri?authorId=57200543200',
                'google_scholar_link' => 'https://scholar.google.com/citations?user=abc456',
                'sinta_link' => 'https://sinta.kemdikbud.go.id/authors/detail?id=6012',
                'lab_managed' => 'Laboratorium Pemrograman',
                'status' => 'active',
            ],
            [
                'name' => 'Yusep Rosmansyah, S.T., M.Sc., Ph.D.',
                'nip' => '197305121998021002',
                'nidn' => '0012057302',
                'functional_position' => 'Lektor Kepala',
                'study_program_id' => $spSti->id,
                'research_group_id' => $rgSi->id,
                'research_fields' => 'E-Learning, Mobile Application, Information Systems Management',
                'email' => 'yusep@stei.itb.ac.id',
                'photo' => 'lecturers/yusep.jpg',
                'scopus_link' => 'https://www.scopus.com/authid/detail.uri?authorId=55566677700',
                'google_scholar_link' => 'https://scholar.google.com/citations?user=def789',
                'sinta_link' => 'https://sinta.kemdikbud.go.id/authors/detail?id=6013',
                'lab_managed' => 'Laboratorium Sistem Informasi',
                'status' => 'active',
            ],
            [
                'name' => 'Ir. Budi Rahardjo, M.Sc., Ph.D.',
                'nip' => '196211231988031001',
                'nidn' => '0023116201',
                'functional_position' => 'Lektor Kepala',
                'study_program_id' => $spIf->id,
                'research_group_id' => $rgTk->id,
                'research_fields' => 'Information Security, Microelectronics, IC Design',
                'email' => 'budi@stei.itb.ac.id',
                'photo' => 'lecturers/budi.jpg',
                'scopus_link' => 'https://www.scopus.com/authid/detail.uri?authorId=88889999000',
                'google_scholar_link' => 'https://scholar.google.com/citations?user=ghi012',
                'sinta_link' => 'https://sinta.kemdikbud.go.id/authors/detail?id=6014',
                'lab_managed' => 'Laboratorium Keamanan Informasi',
                'status' => 'active',
            ],
        ];

        foreach ($lecturers as $lec) {
            Lecturer::updateOrCreate(
                ['email' => $lec['email']],
                $lec
            );
        }
    }
}
