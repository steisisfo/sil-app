<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use App\Models\Research;
use App\Models\ResearchGroup;
use Illuminate\Database\Seeder;

class ResearchSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil data master kelompok keahlian
        $rgRpl = ResearchGroup::where('name', 'Kelompok Keahlian Rekayasa Perangkat Lunak dan Data')->first();
        $rgTel = ResearchGroup::where('name', 'Kelompok Keahlian Telekomunikasi')->first();
        $rgTk = ResearchGroup::where('name', 'Kelompok Keahlian Teknik Komputer')->first();

        // Ambil dosen untuk direlasikan
        $lecturerTutun = Lecturer::where('email', 'tutun@stei.itb.ac.id')->first();
        $lecturerRinaldi = Lecturer::where('email', 'rinaldi@stei.itb.ac.id')->first();
        $lecturerBudi = Lecturer::where('email', 'budi@stei.itb.ac.id')->first();

        // Buat data riset/publikasi
        $researches = [
            [
                'title' => 'Development of Decentralized Cryptography for Lightweight IoT Devices',
                'abstract' => 'Penelitian ini mengembangkan skema kriptografi ringan terdesentralisasi menggunakan blockchain mini untuk mengamankan komunikasi data pada perangkat IoT dengan sumber daya terbatas.',
                'year' => 2024,
                'type' => 'journal',
                'document_link' => 'https://doi.org/10.1016/j.iot.2024.100100',
                'funding_source' => 'Riset Dikti',
                'status' => 'completed',
                'research_group_id' => $rgTk->id,
                'authors' => [
                    ['id' => $lecturerBudi->id, 'primary' => true],
                    ['id' => $lecturerRinaldi->id, 'primary' => false],
                ],
            ],
            [
                'title' => 'Performance Analysis of 5G Non-Terrestrial Network in Mountainous Areas',
                'abstract' => 'Penelitian ini menganalisis propagasi dan redaman sinyal 5G dari satelit orbit rendah (LEO) ke area pegunungan di Indonesia menggunakan pemodelan 3D ray-tracing.',
                'year' => 2025,
                'type' => 'conference',
                'document_link' => 'https://doi.org/10.1109/NTN.2025.01',
                'funding_source' => 'ITB Research Grant',
                'status' => 'ongoing',
                'research_group_id' => $rgTel->id,
                'authors' => [
                    ['id' => $lecturerTutun->id, 'primary' => true],
                ],
            ],
            [
                'title' => 'Steganografi Citra Digital Berbasis Modifikasi Bit Least Significant Bit Tingkat Lanjut',
                'abstract' => 'Metode baru steganografi citra digital dengan menyembunyikan data rahasia pada piksel tepi citra untuk meningkatkan keamanan terhadap analisis statistik steganalisis.',
                'year' => 2023,
                'type' => 'journal',
                'document_link' => 'https://doi.org/10.22146/jnteti.v12i2.200',
                'funding_source' => 'DIPA STEI ITB',
                'status' => 'completed',
                'research_group_id' => $rgRpl->id,
                'authors' => [
                    ['id' => $lecturerRinaldi->id, 'primary' => true],
                ],
            ],
        ];

        foreach ($researches as $rData) {
            $authors = $rData['authors'];
            unset($rData['authors']);

            $research = Research::updateOrCreate(
                ['title' => $rData['title']],
                $rData
            );

            // Hubungkan penulis dosen melalui tabel pivot
            $syncData = [];
            foreach ($authors as $author) {
                $syncData[$author['id']] = ['is_primary_author' => $author['primary']];
            }
            $research->lecturers()->sync($syncData);
        }
    }
}
