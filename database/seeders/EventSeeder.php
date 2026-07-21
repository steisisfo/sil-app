<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'name' => ['id' => 'Kuliah Umum: Tren Cybersecurity Terkini di Era AI', 'en' => 'Public Lecture: Latest Cybersecurity Trends in the AI Era'],
                'slug' => 'kuliah-umum-cybersecurity-era-ai',
                'type' => 'seminar',
                'start_datetime' => '2026-08-10 09:00:00',
                'end_datetime' => '2026-08-10 12:00:00',
                'location' => ['id' => 'Aula Barat ITB & Zoom Meeting', 'en' => 'West Hall ITB & Zoom Meeting'],
                'description' => ['id' => 'Kuliah umum bersama narasumber dari BSSN dan praktisi keamanan teknologi global yang membahas tantangan proteksi data pribadi terhadap serangan berbasis AI.'],
                'registration_link' => 'https://bit.ly/kulumstei2026',
                'speakers' => 'Kepala Deputi Proteksi BSSN, Senior Architect Cisco Indonesia',
                'organizer' => 'Program Studi S1 Sistem dan Teknologi Informasi',
                'poster' => 'events/poster-kulum.jpg',
                'status' => 'upcoming',
            ],
            [
                'name' => ['id' => 'Workshop: Hands-on Development on 5G Micro-controllers', 'en' => 'Workshop: Hands-on Development on 5G Micro-controllers'],
                'slug' => 'workshop-hands-on-5g-microcontrollers',
                'type' => 'workshop',
                'start_datetime' => '2026-07-25 13:00:00',
                'end_datetime' => '2026-07-25 17:00:00',
                'location' => ['id' => 'Laboratorium Komputer STEI ITB Gedung Benny Subianto', 'en' => 'Computer Laboratory STEI ITB Benny Subianto Building'],
                'description' => ['id' => 'Pelatihan intensif pengembangan pemrograman mikrokontroler berbasis modul transmisi data 5G secara real-time.'],
                'registration_link' => 'https://bit.ly/work-5g-stei',
                'speakers' => 'Tim Riset Laboratorium Teknik Komputer STEI ITB',
                'organizer' => 'Kelompok Keahlian Teknik Komputer ITB',
                'poster' => 'events/poster-workshop5g.jpg',
                'status' => 'upcoming',
            ],
            [
                'name' => ['id' => 'Sidang Pleno & Pelepasan Wisuda STEI ITB Periode Juli 2026', 'en' => 'Plenary Session & Graduation Release STEI ITB July 2026 Period'],
                'slug' => 'pelepasan-wisuda-stei-juli-2026',
                'type' => 'graduation',
                'start_datetime' => '2026-07-18 08:00:00',
                'end_datetime' => '2026-07-18 11:30:00',
                'location' => ['id' => 'Gedung Serba Guna ITB (GSG)', 'en' => 'ITB Multipurpose Building (GSG)'],
                'description' => ['id' => 'Acara seremonial pelepasan wisudawan program Sarjana, Magister, dan Doktor STEI ITB periode wisuda kedua tahun akademik 2025/2026.'],
                'registration_link' => null,
                'speakers' => 'Dekan STEI ITB, Perwakilan Ikatan Alumni (IA-STEI ITB)',
                'organizer' => 'Humas STEI ITB',
                'poster' => 'events/wisuda-juli.jpg',
                'status' => 'completed',
            ],
        ];

        foreach ($events as $e) {
            Event::updateOrCreate(
                ['slug' => $e['slug']],
                $e
            );
        }
    }
}
