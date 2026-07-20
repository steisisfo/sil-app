<?php

namespace Database\Seeders;

use App\Models\ResearchGroup;
use Illuminate\Database\Seeder;

class ResearchGroupSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            [
                'name' => 'Kelompok Keahlian Rekayasa Perangkat Lunak dan Data',
                'description' => 'Fokus pada metodologi pengembangan perangkat lunak, arsitektur sistem perangkat lunak, kecerdasan buatan, penambangan data, dan rekayasa kebutuhan.',
            ],
            [
                'name' => 'Kelompok Keahlian Sistem Informasi',
                'description' => 'Fokus pada tata kelola teknologi informasi, manajemen risiko sistem informasi, arsitektur enterprise, audit TI, dan e-government.',
            ],
            [
                'name' => 'Kelompok Keahlian Teknik Komputer',
                'description' => 'Fokus pada sistem benam (embedded systems), arsitektur komputer modern, Internet of Things (IoT), robotika, dan jaringan komputer.',
            ],
            [
                'name' => 'Kelompok Keahlian Telekomunikasi',
                'description' => 'Fokus pada pemrosesan sinyal digital, komunikasi seluler 5G/6G, antena, propagasi gelombang, serat optik, dan protokol komunikasi.',
            ],
            [
                'name' => 'Kelompok Keahlian Kontrol dan Sistem Cerdas',
                'description' => 'Fokus pada teori kendali otomatis, pemrosesan citra, visi komputer, pemelajaran mesin, dan sistem kendali industri.',
            ],
        ];

        foreach ($groups as $g) {
            ResearchGroup::updateOrCreate(
                ['name' => $g['name']],
                $g
            );
        }
    }
}
