<?php

namespace Database\Seeders;

use App\Models\SearchLog;
use Illuminate\Database\Seeder;

class SearchLogSeeder extends Seeder
{
    public function run(): void
    {
        $logs = [
            [
                'keyword' => 'Pendaftaran Beasiswa',
                'results_count' => 3,
                'searched_at' => now()->subHours(5),
                'created_at' => now()->subHours(5),
            ],
            [
                'keyword' => 'Mata Kuliah Informatika',
                'results_count' => 12,
                'searched_at' => now()->subHours(3),
                'created_at' => now()->subHours(3),
            ],
            [
                'keyword' => 'Dosen RPL',
                'results_count' => 2,
                'searched_at' => now()->subHour(),
                'created_at' => now()->subHour(),
            ],
            [
                'keyword' => 'Jadwal Wisuda',
                'results_count' => 0, // Mocking empty result to test report
                'searched_at' => now()->subMinutes(15),
                'created_at' => now()->subMinutes(15),
            ],
        ];

        foreach ($logs as $log) {
            SearchLog::firstOrCreate(
                [
                    'keyword' => $log['keyword'],
                    'searched_at' => $log['searched_at']
                ],
                $log
            );
        }
    }
}
