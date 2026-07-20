<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Pengajuan Surat Keterangan Mahasiswa Aktif',
                'category' => 'academic',
                'description' => 'Layanan pembuatan surat keterangan resmi yang menerangkan bahwa mahasiswa yang bersangkutan masih aktif berkuliah pada semester berjalan untuk keperluan administrasi tunjangan, asuransi, atau lainnya.',
                'procedure' => '1. Mahasiswa mengunduh draf formulir surat aktif.' . "\n" .
                               '2. Mengisi data diri lengkap dan mengunggah kartu tanda mahasiswa.' . "\n" .
                               '3. Mengirimkan permohonan melalui sistem.' . "\n" .
                               '4. Staf kemahasiswaan memverifikasi berkas dan mengeluarkan surat bertanda tangan digital (TTE).',
                'related_link' => 'https://akademik.stei.itb.ac.id/surat-aktif',
                'pic_contact' => 'akademik-staff@stei.itb.ac.id',
                'document_file' => 'services/Formulir_Surat_Keterangan_Aktif.pdf',
                'status' => 'active',
            ],
            [
                'name' => 'Layanan Pendaftaran Ujian Akhir & Sidang Tesis',
                'category' => 'academic',
                'description' => 'Layanan pendaftaran administrasi kelayakan uji sidang tugas akhir bagi mahasiswa program sarjana dan tesis bagi program magister.',
                'procedure' => '1. Mahasiswa meminta persetujuan dosen pembimbing secara tertulis.' . "\n" .
                               '2. Menyerahkan berkas transkrip nilai sementara, bebas pinjam perpustakaan, dan draf tugas akhir.' . "\n" .
                               '3. Jadwal ujian akan ditentukan dan dipublikasikan maksimal H-3.',
                'related_link' => null,
                'pic_contact' => 'sidang-komisi@stei.itb.ac.id',
                'document_file' => 'services/Panduan_Administrasi_Sidang_STEI.pdf',
                'status' => 'active',
            ],
            [
                'name' => 'Pengajuan Rekomendasi Beasiswa Kemahasiswaan',
                'category' => 'student_affairs',
                'description' => 'Layanan penerbitan surat rekomendasi resmi dari Dekanat STEI ITB bagi mahasiswa yang mendaftar beasiswa baik dari instansi pemerintah, yayasan swasta, maupun industri.',
                'procedure' => '1. Mahasiswa mengajukan permohonan dengan melampirkan berkas prestasi akademik (IPK).' . "\n" .
                               '2. Melampirkan berkas pendukung pendapatan orang tua/surat keterangan tidak mampu (jika relevan).' . "\n" .
                               '3. Proses validasi memakan waktu 3 hari kerja.',
                'related_link' => 'https://kemahasiswaan.itb.ac.id/',
                'pic_contact' => 'kemahasiswaan@stei.itb.ac.id',
                'document_file' => 'services/Format_Rekomendasi_Beasiswa_STEI.pdf',
                'status' => 'active',
            ],
        ];

        foreach ($services as $s) {
            Service::updateOrCreate(
                ['name' => $s['name']],
                $s
            );
        }
    }
}
