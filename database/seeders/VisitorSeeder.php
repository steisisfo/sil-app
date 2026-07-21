<?php

namespace Database\Seeders;

use App\Models\Visitor;
use Illuminate\Database\Seeder;

class VisitorSeeder extends Seeder
{
    public function run(): void
    {
        $logs = [
            [
                'ip_address' => '102.16.89.20',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',
                'page_url' => 'https://stei.itb.ac.id/id/',
                'visited_at' => now()->subHours(2),
                'created_at' => now()->subHours(2),
            ],
            [
                'ip_address' => '102.16.89.20',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',
                'page_url' => 'https://stei.itb.ac.id/id/sejarah-stei',
                'visited_at' => now()->subHours(2)->addMinutes(15),
                'created_at' => now()->subHours(2)->addMinutes(15),
            ],
            [
                'ip_address' => '202.110.15.67',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.3 Safari/605.1.15',
                'page_url' => 'https://stei.itb.ac.id/id/visi-misi',
                'visited_at' => now()->subHour(),
                'created_at' => now()->subHour(),
            ],
            [
                'ip_address' => '182.253.11.230',
                'user_agent' => 'Mozilla/5.0 (Linux; Android 14; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36',
                'page_url' => 'https://stei.itb.ac.id/id/stei-itb-selenggarakan-icici-2026',
                'visited_at' => now()->subMinutes(30),
                'created_at' => now()->subMinutes(30),
            ],
        ];

        foreach ($logs as $log) {
            Visitor::firstOrCreate(
                [
                    'ip_address' => $log['ip_address'],
                    'page_url' => $log['page_url'],
                    'visited_at' => $log['visited_at'],
                ],
                $log
            );
        }
    }
}
