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
                'name' => ['id' => 'Pengajuan Surat Keterangan Mahasiswa Aktif', 'en' => 'Application for Active Student Certificate'],
                'category' => 'academic',
                'description' => ['id' => 'Layanan pembuatan surat keterangan resmi yang menerangkan bahwa mahasiswa yang bersangkutan masih aktif berkuliah pada semester berjalan untuk keperluan administrasi tunjangan, asuransi, atau lainnya.'],
                'procedure' => ['id' => '1. Mahasiswa mengunduh draf formulir surat aktif.'."\n".
                               '2. Mengisi data diri lengkap dan mengunggah kartu tanda mahasiswa.'."\n".
                               '3. Mengirimkan permohonan melalui sistem.'."\n".
                               '4. Staf kemahasiswaan memverifikasi berkas dan mengeluarkan surat bertanda tangan digital (TTE).'],
                'related_link' => 'https://akademik.stei.itb.ac.id/surat-aktif',
                'pic_contact' => 'akademik-staff@stei.itb.ac.id',
                'document_file' => 'services/Formulir_Surat_Keterangan_Aktif.pdf',
                'status' => 'active',
            ],
            [
                'name' => ['id' => 'Layanan Pendaftaran Ujian Akhir & Sidang Tesis', 'en' => 'Final Examination & Thesis Defense Registration Service'],
                'category' => 'academic',
                'description' => ['id' => 'Layanan pendaftaran administrasi kelayakan uji sidang tugas akhir bagi mahasiswa program sarjana dan tesis bagi program magister.'],
                'procedure' => ['id' => '1. Mahasiswa meminta persetujuan dosen pembimbing secara tertulis.'."\n".
                               '2. Menyerahkan berkas transkrip nilai sementara, bebas pinjam perpustakaan, dan draf tugas akhir.'."\n".
                               '3. Jadwal ujian akan ditentukan dan dipublikasikan maksimal H-3.'],
                'related_link' => null,
                'pic_contact' => 'sidang-komisi@stei.itb.ac.id',
                'document_file' => 'services/Panduan_Administrasi_Sidang_STEI.pdf',
                'status' => 'active',
            ],
            [
                'name' => ['id' => 'Pengajuan Rekomendasi Beasiswa Kemahasiswaan', 'en' => 'Application for Student Scholarship Recommendation'],
                'category' => 'student_affairs',
                'description' => ['id' => 'Layanan penerbitan surat rekomendasi resmi dari Dekanat STEI ITB bagi mahasiswa yang mendaftar beasiswa baik dari instansi pemerintah, yayasan swasta, maupun industri.'],
                'procedure' => ['id' => '1. Mahasiswa mengajukan permohonan dengan melampirkan berkas prestasi akademik (IPK).'."\n".
                               '2. Melampirkan berkas pendukung pendapatan orang tua/surat keterangan tidak mampu (jika relevan).'."\n".
                               '3. Proses validasi memakan waktu 3 hari kerja.'],
                'related_link' => 'https://kemahasiswaan.itb.ac.id/',
                'pic_contact' => 'kemahasiswaan@stei.itb.ac.id',
                'document_file' => 'services/Format_Rekomendasi_Beasiswa_STEI.pdf',
                'status' => 'active',
            ],
        ];

        foreach ($services as $s) {
            Service::updateOrCreate(
                ['pic_contact' => $s['pic_contact']],
                $s
            );
        }
    }
}
