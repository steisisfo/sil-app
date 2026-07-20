<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // 1. Master Tables (Tanpa ketergantungan)
            UserSeeder::class,
            StudyProgramSeeder::class,
            ResearchGroupSeeder::class,

            // 2. Master-dependent / Relational Master Tables
            LecturerSeeder::class,
            ResearchSeeder::class, // Bergantung pada ResearchGroup & Lecturer (pivot)

            // 3. Transaction / Content Tables (Bergantung pada User/Master)
            PageSeeder::class,
            AdmissionSeeder::class,
            PartnershipSeeder::class,
            NewsSeeder::class,
            EventSeeder::class,
            AnnouncementSeeder::class,
            ServiceSeeder::class,

            // 4. System / Log Tables
            VisitorSeeder::class,
            SearchLogSeeder::class,
        ]);
    }
}
