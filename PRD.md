# Product Requirements Document (PRD)
## Sistem Informasi Layanan Balai Pelestarian Kebudayaan DI Yogyakarta

| | |
|--|--|
| **Nama Sistem** | Sistem Informasi Layanan Publik Kebudayaan |
| **Tanggal** | 16 Juli 2026 |
| **Penyusun** | — |
| **Instansi** | Balai Pelestarian Kebudayaan Daerah Istimewa Yogyakarta |

---

## Ringkasan Sistem

> *Sistem digital terpadu untuk mengelola dan menyajikan informasi situs cagar budaya di wilayah DI Yogyakarta.*

Balai Pelestarian Kebudayaan DI Yogyakarta membutuhkan sistem digital terpadu untuk mengelola layanan **informasi lokasi cagar budaya (candi, situs budaya, tempat bersejarah, pendopo, dll.) serta penggunaan fasilitas cagar budaya**. Sistem ini memudahkan pengunjung/masyarakat umum untuk melihat dan mencari informasi lokasi situs budaya secara online, membantu admin mengelola data situs cagar budaya, dan memberikan pimpinan laporan real-time terkait kunjungan dan penggunaan fasilitas. Target: menyediakan **akses informasi cagar budaya yang terpusat dan mudah diakses** serta memudahkan pengelolaan permohonan penggunaan fasilitas cagar budaya secara digital.

---

## 1. Pengguna Sistem

| Peran | Siapa | Yang Mereka Lakukan |
|-------|-------|---------------------|
| **Administrator** | Staf TI Balai Pelestarian Kebudayaan | Kelola seluruh data master, hak akses pengguna, dan konfigurasi sistem |
| **Operator/Pengelola Situs** | Staf administrasi / petugas lapangan | Input & perbarui data situs cagar budaya, verifikasi permohonan penggunaan fasilitas, kelola dokumentasi |
| **Pimpinan** | Kepala Balai Pelestarian Kebudayaan | Lihat dashboard dan laporan statistik kunjungan & penggunaan fasilitas — hanya baca |
| **Pengunjung (Publik)** | Masyarakat umum / wisatawan / peneliti | Melihat daftar & detail lokasi cagar budaya (candi, situs, pendopo, dll.), mencari berdasarkan kategori/lokasi, mengajukan permohonan penggunaan fasilitas |

---

## 2. Layanan yang Dikelola Sistem

> *Untuk setiap layanan: jelaskan alurnya dan data apa yang perlu dicatat.*
> *Aturan bisnis penting wajib dituliskan — ini yang akan menjadi validasi di sistem.*

---

### Layanan 1 — Informasi & Direktori Situs Cagar Budaya

**Deskripsi:** Penyajian informasi lengkap mengenai lokasi-lokasi cagar budaya di wilayah DI Yogyakarta, meliputi candi, situs budaya, tempat bersejarah, pendopo, dan bangunan/kawasan bersejarah lainnya. Pengunjung dapat menelusuri, mencari, dan melihat detail setiap situs.

**Alur:**
1. Admin/Operator menginput data situs cagar budaya ke dalam sistem (nama, deskripsi, kategori, lokasi/koordinat, foto, sejarah)
2. Data situs ditampilkan di halaman publik dalam bentuk daftar dan peta interaktif
3. Pengunjung dapat mencari situs berdasarkan kategori (candi, situs budaya, tempat bersejarah, pendopo, dll.), lokasi (kabupaten/kota), atau kata kunci
4. Pengunjung melihat halaman detail situs yang menampilkan deskripsi, galeri foto, lokasi di peta, jam operasional, dan informasi kontak
5. Admin/Operator dapat memperbarui atau menonaktifkan data situs sewaktu-waktu

**Data yang dicatat:** nama situs · kategori (candi/situs budaya/tempat bersejarah/pendopo/lainnya) · deskripsi lengkap · sejarah singkat · alamat · kabupaten/kota · koordinat GPS (latitude, longitude) · galeri foto · jam operasional · status (aktif/tidak aktif) · nomor SK penetapan cagar budaya · tahun penetapan · pengelola/juru pelihara

**Aturan bisnis:**
- Setiap situs **wajib memiliki** minimal nama, kategori, alamat, dan koordinat GPS
- Kategori situs terdiri dari: **Candi, Situs Budaya, Tempat Bersejarah, Pendopo, Bangunan Bersejarah, Kawasan Cagar Budaya**
- Situs yang berstatus **tidak aktif** tidak ditampilkan di halaman publik tetapi tetap tersimpan di database
- Hanya **Admin dan Operator** yang dapat menambah, mengubah, dan menghapus data situs

---

### Layanan 2 — Pengajuan Kunjungan ke Situs Cagar Budaya

**Deskripsi:** Layanan bagi masyarakat, institusi pendidikan, peneliti, atau rombongan wisata untuk mengajukan permohonan kunjungan resmi ke situs cagar budaya tertentu, terutama yang memerlukan izin atau koordinasi khusus.

**Alur:**
1. Pengunjung memilih situs cagar budaya yang ingin dikunjungi
2. Pengunjung mengisi formulir permohonan kunjungan (nama pemohon, asal instansi/lembaga, tujuan kunjungan, tanggal kunjungan, jumlah pengunjung)
3. Pengunjung mengunggah surat permohonan resmi (jika diperlukan)
4. Operator memverifikasi kelengkapan data dan ketersediaan jadwal
5. Operator mengkonfirmasi atau menolak permohonan dengan alasan
6. Pengunjung menerima notifikasi/surat konfirmasi kunjungan
7. Setelah kunjungan, Operator mencatat realisasi kunjungan

**Data yang dicatat:** nama pemohon · asal instansi/lembaga · nomor telepon/email · situs tujuan · tanggal kunjungan · jumlah pengunjung · tujuan kunjungan (wisata/pendidikan/penelitian/lainnya) · surat permohonan (file) · status permohonan · catatan/alasan penolakan · realisasi jumlah pengunjung

**Aturan bisnis:**
- Permohonan kunjungan harus diajukan minimal **H-3** sebelum tanggal kunjungan
- Jumlah pengunjung per rombongan maksimal **100 orang** — jika melebihi, harus mengajukan permohonan terpisah
- Status permohonan: **Diajukan → Diverifikasi → Disetujui/Ditolak → Selesai**
- Satu situs tidak boleh menerima lebih dari **3 rombongan** di tanggal yang sama (kecuali situs terbuka)
- Kunjungan untuk tujuan **penelitian** wajib melampirkan surat rekomendasi dari institusi

---

### Layanan 3 — Penggunaan Fasilitas Cagar Budaya

**Deskripsi:** Layanan permohonan penggunaan fasilitas yang ada di lingkungan cagar budaya, seperti pendopo untuk acara budaya, ruang terbuka untuk pertunjukan seni, halaman candi untuk upacara adat, atau fasilitas lainnya.

**Alur:**
1. Pemohon mengecek ketersediaan fasilitas di kalender yang tersedia di sistem
2. Pemohon mengisi formulir permohonan penggunaan fasilitas (nama pemohon, instansi, jenis fasilitas, tanggal & durasi penggunaan, jenis kegiatan, jumlah peserta)
3. Pemohon mengunggah dokumen pendukung (surat permohonan resmi, proposal kegiatan)
4. Operator memverifikasi permohonan dan ketersediaan fasilitas
5. Pimpinan memberikan persetujuan untuk penggunaan fasilitas
6. Operator mengirimkan surat izin penggunaan fasilitas kepada pemohon
7. Pemohon melakukan penggunaan fasilitas sesuai jadwal
8. Operator mencatat realisasi dan kondisi fasilitas pasca-penggunaan

**Data yang dicatat:** nama pemohon · instansi/lembaga · kontak (telepon/email) · nama fasilitas · tanggal mulai · tanggal selesai · durasi penggunaan · jenis kegiatan · deskripsi kegiatan · jumlah peserta · dokumen pendukung (file) · status permohonan · catatan persetujuan pimpinan · kondisi fasilitas pasca-penggunaan

**Aturan bisnis:**
- Satu fasilitas **tidak bisa digunakan dua kali** pada tanggal yang sama (kecuali fasilitas yang memungkinkan penggunaan bersamaan)
- Permohonan penggunaan fasilitas harus diajukan minimal **H-7** sebelum tanggal penggunaan
- Kegiatan yang bersifat **komersial** memerlukan persetujuan tambahan dari Pimpinan
- Jenis kegiatan yang diperbolehkan: **Upacara Adat, Pertunjukan Seni & Budaya, Kegiatan Pendidikan, Pameran, Kegiatan Sosial/Keagamaan**
- Kegiatan yang berpotensi **merusak situs cagar budaya** tidak diperbolehkan
- Status permohonan: **Diajukan → Diverifikasi → Menunggu Persetujuan Pimpinan → Disetujui/Ditolak → Selesai**
- Pemohon wajib menjaga kelestarian dan kebersihan fasilitas selama penggunaan

---

### Layanan 4 — Pengelolaan Data Juru Pelihara & Pemeliharaan Situs

**Deskripsi:** Pencatatan dan pengelolaan data juru pelihara (juru kunci) situs cagar budaya beserta kegiatan pemeliharaan rutin dan insidental yang dilakukan pada setiap situs.

**Alur:**
1. Admin menginput data juru pelihara dan menetapkan situs yang menjadi tanggung jawabnya
2. Juru pelihara/Operator mencatat kegiatan pemeliharaan rutin (pembersihan, perawatan, dll.)
3. Juru pelihara/Operator melaporkan kondisi situs secara berkala atau jika ada kerusakan
4. Operator memverifikasi laporan dan menindaklanjuti jika diperlukan perbaikan
5. Pimpinan memonitor status pemeliharaan seluruh situs melalui dashboard

**Data yang dicatat:** nama juru pelihara · NIP/NIK · kontak · situs yang dipelihara · jenis kegiatan pemeliharaan · tanggal pemeliharaan · deskripsi kegiatan · foto dokumentasi · kondisi situs (baik/rusak ringan/rusak berat) · tindak lanjut yang diperlukan

**Aturan bisnis:**
- Setiap situs cagar budaya **wajib memiliki** minimal 1 juru pelihara yang bertanggung jawab
- Laporan pemeliharaan rutin wajib dibuat **minimal 1 kali per bulan**
- Kerusakan berat harus dilaporkan **dalam 1×24 jam** dan ditindaklanjuti segera
- Hanya **Admin dan Operator** yang dapat mengelola data juru pelihara

---

## 3. Laporan & Dashboard yang Dibutuhkan

### Dashboard Utama (tampil saat login)

| Informasi | Keterangan |
|-----------|------------|
| Total situs cagar budaya | Jumlah seluruh situs aktif yang terdaftar, dikelompokkan per kategori |
| Permohonan kunjungan bulan ini | Jumlah permohonan kunjungan yang masuk bulan berjalan beserta statusnya |
| Penggunaan fasilitas bulan ini | Jumlah permohonan penggunaan fasilitas bulan berjalan beserta statusnya |
| Peta sebaran situs | Peta interaktif yang menampilkan lokasi seluruh situs cagar budaya |
| Statistik pengunjung | Grafik jumlah pengunjung per situs per bulan |
| Status pemeliharaan | Ringkasan kondisi situs (baik/rusak ringan/rusak berat) |

### Laporan Berkala

| Laporan | Frekuensi | Isi | Format |
|---------|-----------|-----|--------|
| Rekap Kunjungan Situs | Bulanan | Total kunjungan per situs, per kategori tujuan kunjungan | Excel & PDF |
| Rekap Penggunaan Fasilitas | Bulanan | Total penggunaan per fasilitas, per jenis kegiatan | Excel & PDF |
| Statistik Pengunjung | Triwulanan | Tren jumlah pengunjung per situs, demografi asal instansi | PDF |
| Laporan Kondisi Situs | Semester | Kondisi terkini seluruh situs, rekapitulasi pemeliharaan | PDF |
| Laporan Tahunan Pelestarian | Tahunan | Ringkasan seluruh layanan, pencapaian, dan rekomendasi | PDF |

---

> **Catatan untuk AI Coding Assistant:**
> - Setiap **layanan** di Bagian 2 → 1 modul Filament Resource + set tabel database
> - Setiap **alur** → urutan status pada kolom `status` di tabel transaksi
> - Setiap **data yang dicatat** → kolom-kolom pada tabel yang bersangkutan
> - Setiap **aturan bisnis** → validasi dan business logic di Model/Controller
> - Bagian 3 → widget dashboard Filament + fitur ekspor PDF/Excel
> - Halaman publik (pengunjung) → route web biasa (bukan Filament), menampilkan daftar & detail situs dengan peta interaktif
> - Peta interaktif dapat menggunakan Leaflet.js dengan tile OpenStreetMap

---
