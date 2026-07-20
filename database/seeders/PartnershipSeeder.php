<?php

namespace Database\Seeders;

use App\Models\Partnership;
use Illuminate\Database\Seeder;

class PartnershipSeeder extends Seeder
{
    public function run(): void
    {
        $partnerships = [
            [
                'partner_name' => 'PT Telekomunikasi Selular (Telkomsel)',
                'partnership_type' => 'industry',
                'start_date' => '2025-01-15',
                'end_date' => '2028-01-15',
                'description' => 'Kerja sama riset dan implementasi sistem 5G Smart Campus serta penyediaan program magang bersertifikat bagi mahasiswa STEI ITB.',
                'contact_info' => 'corporate-relation@telkomsel.co.id',
                'logo' => 'partners/telkomsel.png',
                'document_file' => 'mou/MoU_Telkomsel_STEI_2025.pdf',
                'status' => 'active',
            ],
            [
                'partner_name' => 'Kyoto University',
                'partnership_type' => 'international',
                'start_date' => '2024-06-10',
                'end_date' => '2029-06-10',
                'description' => 'Program pertukaran mahasiswa (student exchange), riset kolaboratif bidang kecerdasan buatan, dan penyelenggaraan joint-seminar tahunan.',
                'contact_info' => 'global-affairs@kyoto-u.ac.jp',
                'logo' => 'partners/kyoto-u.png',
                'document_file' => 'mou/MoU_KyotoUniv_ITB_2024.pdf',
                'status' => 'active',
            ],
            [
                'partner_name' => 'Badan Sandi dan Siber Negara (BSSN)',
                'partnership_type' => 'research',
                'start_date' => '2023-03-01',
                'end_date' => '2026-03-01',
                'description' => 'Kerja sama pengembangan sistem kriptografi lokal dan laboratorium bersama audit keamanan siber.',
                'contact_info' => 'kontak@bssn.go.id',
                'logo' => 'partners/bssn.png',
                'document_file' => 'mou/MoU_BSSN_STEI_2023.pdf',
                'status' => 'active',
            ],
        ];

        foreach ($partnerships as $p) {
            Partnership::updateOrCreate(
                ['partner_name' => $p['partner_name']],
                $p
            );
        }
    }
}
