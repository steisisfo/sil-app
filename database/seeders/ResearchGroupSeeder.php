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
                'name' => ['id' => 'Kelompok Keahlian Rekayasa Perangkat Lunak dan Data', 'en' => 'Software Engineering and Data Science Research Group'],
                'description' => ['id' => 'Fokus pada metodologi pengembangan perangkat lunak, arsitektur sistem perangkat lunak, kecerdasan buatan, penambangan data, dan rekayasa kebutuhan.'],
            ],
            [
                'name' => ['id' => 'Kelompok Keahlian Sistem Informasi', 'en' => 'Information Systems Research Group'],
                'description' => ['id' => 'Fokus pada tata kelola teknologi informasi, manajemen risiko sistem informasi, arsitektur enterprise, audit TI, dan e-government.'],
            ],
            [
                'name' => ['id' => 'Kelompok Keahlian Teknik Komputer', 'en' => 'Computer Engineering Research Group'],
                'description' => ['id' => 'Fokus pada sistem benam (embedded systems), arsitektur komputer modern, Internet of Things (IoT), robotika, dan jaringan komputer.'],
            ],
            [
                'name' => ['id' => 'Kelompok Keahlian Telekomunikasi', 'en' => 'Telecommunication Engineering Research Group'],
                'description' => ['id' => 'Fokus pada pemrosesan sinyal digital, komunikasi seluler 5G/6G, antena, propagasi gelombang, serat optik, dan protokol komunikasi.'],
            ],
            [
                'name' => ['id' => 'Kelompok Keahlian Kontrol dan Sistem Cerdas', 'en' => 'Control and Intelligent Systems Research Group'],
                'description' => ['id' => 'Fokus pada teori kendali otomatis, pemrosesan citra, visi komputer, pemelajaran mesin, dan sistem kendali industri.'],
            ],
        ];

        foreach ($groups as $g) {
            $record = ResearchGroup::where('name->id', $g['name']['id'])->first();
            if ($record) {
                $record->update($g);
            } else {
                ResearchGroup::create($g);
            }
        }
    }
}
