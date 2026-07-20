# Product Requirements Document (PRD)
## Website Informasi Publik Sekolah Teknik Elektro dan Informatika ITB

| | |
|--|--|
| **Nama Sistem** | Website Informasi Publik Sekolah Teknik Elektro dan Informatika ITB |
| **Tanggal** | 20 Juli 2026 |
| **Penyusun** | [Nama] — [Jabatan] |
| **Instansi** | Sekolah Teknik Elektro dan Informatika, Institut Teknologi Bandung |

---

## Ringkasan Sistem

> *Website informasi publik STEI ITB adalah portal resmi yang menyajikan informasi terkini seputar profil, program pendidikan, penerimaan mahasiswa, dosen, penelitian, kerja sama, berita, agenda, pengumuman, serta layanan akademik dan kemahasiswaan.*

STEI ITB membutuhkan website informasi publik terpadu untuk mengelola dan menyajikan **informasi profil institusi, program pendidikan, penerimaan mahasiswa, dosen dan kelompok keahlian, penelitian, kerja sama, berita, agenda, pengumuman, serta layanan akademik dan kemahasiswaan**. Website ini memudahkan masyarakat umum, calon mahasiswa, mahasiswa, dosen, alumni, dan mitra institusi mengakses informasi secara cepat dan akurat, serta membantu pengelola konten dan administrator mengelola publikasi secara efisien. Target: memangkas waktu pencarian informasi dari **mengunjungi berbagai sumber terpisah dan menghubungi staf secara langsung** menjadi **satu portal terpusat yang selalu terbarui dan mudah diakses kapan saja**.

---

## 1. Pengguna Sistem

| Peran | Siapa | Yang Mereka Lakukan |
|-------|-------|---------------------|
| **Administrator** | Staf TI STEI ITB | Kelola seluruh data website, pengaturan sistem, hak akses pengelola konten, serta pemeliharaan teknis website |
| **Pengelola Konten** | Staf administrasi, humas, atau unit terkait di STEI | Membuat, memperbarui, memeriksa, menerbitkan, dan mengarsipkan konten (berita, pengumuman, agenda, informasi program, profil dosen, dll.) |
| **Masyarakat Umum** | Pengunjung website dari luar komunitas ITB | Mengakses informasi umum tentang STEI ITB, program pendidikan, berita, dan kontak |
| **Calon Mahasiswa** | Siswa SMA/sederajat, lulusan D3/S1 | Mencari informasi program studi, persyaratan penerimaan, jadwal seleksi, dan prosedur pendaftaran |
| **Mahasiswa** | Mahasiswa aktif STEI ITB (S1, S2, S3) | Mengakses pengumuman akademik, agenda, layanan kemahasiswaan, dan informasi terkait perkuliahan |
| **Dosen** | Dosen dan peneliti STEI ITB | Melihat dan memastikan profil, publikasi, serta informasi kelompok keahlian tampil dengan benar di website |
| **Tenaga Kependidikan** | Staf non-akademik STEI ITB | Mengakses informasi internal, pengumuman, dan layanan yang tersedia melalui website |
| **Alumni** | Lulusan STEI ITB | Mengakses informasi alumni, berita terkini, dan peluang kerja sama atau kontribusi |
| **Mitra Institusi** | Industri, lembaga riset, universitas mitra | Mencari informasi kerja sama, kelompok keahlian, dan kontak kolaborasi |

---

## 2. Layanan yang Dikelola Sistem

> *Untuk setiap layanan: jelaskan alurnya dan data apa yang perlu dicatat.*
> *Aturan bisnis penting wajib dituliskan — ini yang akan menjadi validasi di sistem.*

---

### Layanan 1 — Informasi Profil STEI ITB

**Deskripsi:** Penyajian informasi profil lengkap STEI ITB meliputi sejarah, visi & misi, struktur organisasi, pimpinan, fasilitas, serta kontak dan lokasi.

**Alur:**
1. Pengelola konten membuat atau memperbarui halaman profil (sejarah, visi & misi, struktur organisasi, pimpinan, fasilitas, kontak)
2. Pengelola konten memeriksa kelengkapan dan keakuratan informasi
3. Konten diterbitkan dan ditampilkan di halaman website publik
4. Pengelola konten meninjau dan memperbarui informasi secara berkala
5. Konten yang sudah tidak relevan diarsipkan

**Data yang dicatat:** judul halaman · isi konten · gambar/foto · tanggal pembuatan · tanggal pembaruan terakhir · status publikasi (draf/terbit/arsip) · penulis/editor

**Aturan bisnis:**
- Informasi visi & misi dan struktur organisasi harus ditinjau dan dikonfirmasi ulang minimal **setiap 1 tahun** atau saat ada perubahan pimpinan
- Halaman profil wajib memiliki **minimal 1 foto** yang relevan
- Perubahan data pimpinan harus diperbarui **maksimal 7 hari kerja** setelah pelantikan resmi

---

### Layanan 2 — Program Pendidikan

**Deskripsi:** Penyajian informasi lengkap mengenai program studi yang tersedia di STEI ITB, meliputi program sarjana (S1), magister (S2), dan doktor (S3), termasuk kurikulum, capaian pembelajaran, prospek karir, dan akreditasi.

**Alur:**
1. Pengelola konten membuat halaman program studi baru atau memperbarui informasi program studi yang ada
2. Data kurikulum, mata kuliah, capaian pembelajaran, dan akreditasi diinput
3. Konten ditinjau oleh pihak berwenang (ketua program studi/wakil dekan akademik)
4. Konten diterbitkan dan ditampilkan di halaman program pendidikan
5. Informasi kurikulum diperbarui setiap awal tahun akademik atau saat ada perubahan

**Data yang dicatat:** nama program studi · jenjang (S1/S2/S3) · deskripsi program · kurikulum & daftar mata kuliah · capaian pembelajaran · akreditasi · gelar yang diperoleh · durasi studi · prospek karir · kontak program studi

**Aturan bisnis:**
- Setiap program studi harus mencantumkan **status akreditasi terkini** beserta lembaga akreditasi
- Informasi kurikulum wajib diperbarui **setiap awal tahun akademik**
- Setiap program studi harus memiliki **deskripsi minimal 100 kata**

---

### Layanan 3 — Penerimaan Mahasiswa Baru

**Deskripsi:** Penyajian informasi terkait penerimaan mahasiswa baru di semua jenjang, meliputi jalur seleksi, persyaratan, jadwal, biaya pendidikan, serta tautan ke sistem pendaftaran terkait.

**Alur:**
1. Pengelola konten membuat halaman penerimaan mahasiswa baru sesuai periode/jalur seleksi
2. Informasi persyaratan, jadwal, dan biaya pendidikan diinput secara lengkap
3. Tautan ke sistem pendaftaran eksternal (SNBP, SNBT, Mandiri, dsb.) ditautkan
4. Konten diterbitkan sesuai jadwal pembukaan pendaftaran
5. Halaman diperbarui ketika ada perubahan jadwal atau informasi tambahan
6. Setelah periode pendaftaran selesai, konten diarsipkan dan ditandai sebagai periode yang telah lewat

**Data yang dicatat:** jalur seleksi · jenjang · persyaratan masuk · jadwal pendaftaran (buka & tutup) · biaya pendidikan · daya tampung · tautan pendaftaran eksternal · FAQ · kontak informasi · status periode (aktif/arsip)

**Aturan bisnis:**
- Informasi penerimaan harus diterbitkan **minimal 30 hari** sebelum tanggal pembukaan pendaftaran
- Halaman penerimaan yang telah melewati tanggal penutupan harus otomatis ditandai sebagai **"Pendaftaran Ditutup"**
- Setiap halaman penerimaan wajib menyertakan **tautan resmi** ke sistem pendaftaran terkait

---

### Layanan 4 — Direktori Dosen dan Kelompok Keahlian

**Deskripsi:** Penyajian profil dosen dan tenaga pengajar STEI ITB beserta kelompok keahlian (research group), bidang riset, serta publikasi terkait.

**Alur:**
1. Pengelola konten menginput atau memperbarui profil dosen (nama, jabatan, bidang keahlian, kontak, foto, publikasi)
2. Dosen dikelompokkan berdasarkan kelompok keahlian dan program studi
3. Informasi kelompok keahlian (deskripsi, anggota, riset aktif, laboratorium) diinput
4. Konten diterbitkan di halaman direktori dosen dan kelompok keahlian
5. Profil diperbarui secara berkala atau atas permintaan dosen yang bersangkutan

**Data yang dicatat:** nama dosen · NIP/NIDN · jabatan fungsional · program studi · kelompok keahlian · bidang riset · email · foto · daftar publikasi · tautan profil akademik (Google Scholar, Scopus, dsb.) · laboratorium yang diasuh

**Aturan bisnis:**
- Setiap profil dosen wajib memiliki **minimal: nama, jabatan fungsional, program studi, dan email**
- Profil dosen harus ditinjau dan diperbarui **minimal setiap 1 tahun**
- Dosen yang sudah pensiun atau mutasi ditandai statusnya dan dipindahkan dari daftar aktif, namun **tetap tersedia di arsip**

---

### Layanan 5 — Penelitian dan Publikasi

**Deskripsi:** Penyajian informasi terkait kegiatan penelitian, proyek riset, dan publikasi ilmiah yang dihasilkan oleh sivitas akademika STEI ITB.

**Alur:**
1. Pengelola konten menginput informasi proyek penelitian atau publikasi baru
2. Data penelitian dikaitkan dengan kelompok keahlian dan dosen terkait
3. Konten ditinjau dan diterbitkan
4. Informasi diperbarui sesuai perkembangan proyek atau penambahan publikasi baru
5. Proyek yang telah selesai diarsipkan namun tetap dapat diakses

**Data yang dicatat:** judul penelitian/publikasi · abstrak · penulis · kelompok keahlian · tahun · jenis (jurnal/konferensi/buku/paten) · tautan ke dokumen atau repositori · sumber pendanaan · status proyek (berjalan/selesai)

**Aturan bisnis:**
- Setiap entri publikasi wajib memiliki **minimal: judul, penulis, tahun, dan jenis publikasi**
- Publikasi harus dapat **difilter berdasarkan** kelompok keahlian, penulis, tahun, dan jenis
- Tautan ke dokumen sumber (DOI, repositori) harus **dicantumkan jika tersedia**

---

### Layanan 6 — Kerja Sama dan Kemitraan

**Deskripsi:** Penyajian informasi mengenai kerja sama STEI ITB dengan industri, lembaga riset, universitas dalam dan luar negeri, serta peluang kolaborasi.

**Alur:**
1. Pengelola konten menginput informasi kerja sama baru (mitra, jenis kerja sama, periode, deskripsi kegiatan)
2. Konten ditinjau dan diterbitkan
3. Informasi diperbarui sesuai perkembangan atau perpanjangan kerja sama
4. Kerja sama yang telah berakhir diarsipkan dan ditandai statusnya

**Data yang dicatat:** nama mitra · jenis kerja sama (riset/pendidikan/industri/internasional) · periode kerja sama · deskripsi kegiatan · kontak kerja sama · logo mitra · dokumen MoU/MoA (jika bersifat publik) · status (aktif/berakhir)

**Aturan bisnis:**
- Kerja sama yang telah melewati tanggal berakhir harus otomatis ditandai sebagai **"Berakhir"**
- Informasi kerja sama wajib mendapat **persetujuan pihak berwenang** sebelum dipublikasikan
- Logo mitra hanya dapat ditampilkan jika sudah mendapat **izin penggunaan**

---

### Layanan 7 — Berita dan Artikel

**Deskripsi:** Publikasi berita, artikel, dan liputan kegiatan yang berkaitan dengan STEI ITB untuk menyebarluaskan informasi terkini kepada publik.

**Alur:**
1. Pengelola konten membuat draf berita/artikel (judul, isi, gambar, kategori)
2. Draf ditinjau dan disunting
3. Berita/artikel diterbitkan dan tampil di halaman berita serta beranda website
4. Berita terbaru ditampilkan secara otomatis di bagian sorotan beranda
5. Berita lama tetap dapat diakses melalui arsip dan pencarian

**Data yang dicatat:** judul · isi berita · gambar/media · kategori (akademik/riset/kemahasiswaan/umum) · tag/kata kunci · penulis · tanggal terbit · status (draf/terbit/arsip) · jumlah dilihat

**Aturan bisnis:**
- Setiap berita wajib memiliki **minimal: judul, isi, kategori, dan 1 gambar utama**
- Berita di beranda menampilkan **maksimal 6 berita terbaru**
- Berita yang belum diterbitkan (draf) **tidak boleh tampil** di halaman publik
- Berita yang berusia lebih dari **365 hari** ditandai untuk ditinjau apakah masih relevan

---

### Layanan 8 — Agenda dan Acara

**Deskripsi:** Penyajian informasi agenda, seminar, workshop, wisuda, dan acara lainnya yang diselenggarakan oleh atau melibatkan STEI ITB.

**Alur:**
1. Pengelola konten membuat entri agenda baru (nama acara, tanggal, lokasi, deskripsi, tautan pendaftaran)
2. Konten ditinjau dan diterbitkan
3. Agenda mendatang ditampilkan di halaman agenda dan widget kalender di beranda
4. Pengingat atau sorotan diberikan untuk acara yang akan berlangsung dalam waktu dekat
5. Agenda yang telah lewat dipindahkan ke arsip

**Data yang dicatat:** nama acara · jenis acara (seminar/workshop/wisuda/kompetisi/lainnya) · tanggal & waktu mulai · tanggal & waktu selesai · lokasi (fisik/daring) · deskripsi · tautan pendaftaran/streaming · pembicara/narasumber · penyelenggara · poster/gambar · status (mendatang/berlangsung/selesai)

**Aturan bisnis:**
- Agenda yang tanggal pelaksanaannya sudah lewat harus otomatis berpindah status menjadi **"Selesai"**
- Setiap agenda wajib memiliki **minimal: nama acara, tanggal, dan lokasi**
- Agenda yang akan berlangsung dalam **7 hari ke depan** harus ditampilkan sebagai sorotan

---

### Layanan 9 — Pengumuman

**Deskripsi:** Publikasi pengumuman resmi dari STEI ITB yang ditujukan kepada mahasiswa, dosen, tenaga kependidikan, atau publik umum.

**Alur:**
1. Pengelola konten membuat pengumuman baru (judul, isi, target audiens, tanggal berlaku, lampiran)
2. Pengumuman ditinjau oleh pihak berwenang
3. Pengumuman diterbitkan dan ditampilkan di halaman pengumuman serta beranda
4. Pengumuman yang telah melewati tanggal berlaku diarsipkan
5. Pengumuman penting dapat di-pin agar tetap di posisi atas

**Data yang dicatat:** judul · isi pengumuman · target audiens (mahasiswa/dosen/tendik/umum) · tanggal terbit · tanggal berlaku (mulai & selesai) · lampiran (file PDF/dokumen) · prioritas (normal/penting/urgent) · status (draf/terbit/arsip) · penulis

**Aturan bisnis:**
- Pengumuman dengan prioritas **"urgent"** harus tampil sebagai **banner atau notifikasi** di beranda
- Pengumuman yang melewati tanggal akhir berlaku harus otomatis **berpindah ke arsip**
- Pengumuman yang di-pin **maksimal 3 buah** pada satu waktu
- Pengumuman wajib memiliki **minimal: judul, isi, dan target audiens**

---

### Layanan 10 — Layanan Akademik dan Kemahasiswaan

**Deskripsi:** Penyajian informasi dan tautan ke berbagai layanan akademik (jadwal akademik, panduan akademik, formulir, sistem informasi akademik) dan layanan kemahasiswaan (organisasi mahasiswa, beasiswa, karir, konseling) di lingkungan STEI ITB.

**Alur:**
1. Pengelola konten membuat atau memperbarui halaman layanan (nama layanan, deskripsi, prosedur, tautan, kontak, dokumen terkait)
2. Konten ditinjau dan diterbitkan
3. Halaman layanan ditampilkan dan dikelompokkan berdasarkan kategori (akademik/kemahasiswaan)
4. Tautan ke sistem eksternal (SIA, e-learning, dll.) diperbarui jika ada perubahan
5. Konten ditinjau secara berkala untuk memastikan keakuratan

**Data yang dicatat:** nama layanan · kategori (akademik/kemahasiswaan) · deskripsi layanan · prosedur/panduan · tautan terkait · kontak PIC · dokumen/formulir yang dapat diunduh · tanggal pembaruan terakhir · status (aktif/tidak aktif)

**Aturan bisnis:**
- Setiap layanan wajib memiliki **minimal: nama, deskripsi, dan kontak PIC**
- Tautan ke sistem eksternal harus diverifikasi **minimal setiap 3 bulan** untuk memastikan masih aktif
- Dokumen/formulir yang diunggah harus dalam format **PDF** dan ukuran **maksimal 10 MB**
- Layanan yang tidak aktif **tidak ditampilkan** di halaman publik tetapi tetap tersedia di arsip

---

## 3. Laporan & Dashboard yang Dibutuhkan

### Dashboard Utama (tampil saat login)

| Informasi | Keterangan |
|-----------|------------|
| Total kunjungan website bulan ini | Jumlah total pengunjung unik dan pageview bulan berjalan, dibandingkan dengan bulan sebelumnya |
| Halaman paling banyak diakses | 10 halaman dengan jumlah kunjungan tertinggi dalam 30 hari terakhir |
| Berita terbaru yang diterbitkan | Daftar 5 berita terbaru beserta jumlah dilihat |
| Agenda mendatang | Daftar acara yang akan berlangsung dalam 14 hari ke depan |
| Pengumuman aktif | Jumlah pengumuman yang sedang aktif/terbit, termasuk yang berstatus urgent |
| Konten kedaluwarsa | Daftar konten (berita, pengumuman, agenda) yang sudah melewati tanggal berlaku dan perlu ditinjau |
| Pencarian populer | 10 kata kunci pencarian yang paling sering digunakan pengunjung |
| Status pembaruan konten | Ringkasan halaman yang belum diperbarui lebih dari 6 bulan |

### Laporan Berkala

| Laporan | Frekuensi | Isi | Format |
|---------|-----------|-----|--------|
| Statistik Kunjungan Website | Bulanan | Total pengunjung, pageview, sumber trafik, perangkat, dan halaman populer | Excel & PDF |
| Rekap Publikasi Berita & Agenda | Bulanan | Jumlah berita dan agenda diterbitkan per kategori, jumlah dilihat, engagement | PDF |
| Laporan Pencarian Pengguna | Triwulanan | Kata kunci pencarian, frekuensi, dan hasil pencarian kosong (untuk perbaikan konten) | Excel & PDF |
| Laporan Status Konten | Triwulanan | Daftar konten per layanan, status pembaruan, konten kedaluwarsa, dan rekomendasi tindakan | PDF |
| Laporan Aktivitas Pengelolaan | Bulanan | Aktivitas login, penerbitan, pembaruan, dan pengarsipan konten oleh setiap pengelola | Excel & PDF |
| Laporan Kinerja Website | Semesteran | Waktu muat halaman, uptime, error, dan rekomendasi optimasi teknis | PDF |

---

> **Catatan untuk AI Coding Assistant:**
> - Setiap **layanan** di Bagian 2 → 1 modul Filament Resource + set tabel database
> - Setiap **alur** → urutan status pada kolom `status` di tabel terkait
> - Setiap **data yang dicatat** → kolom-kolom pada tabel yang bersangkutan
> - Setiap **aturan bisnis** → validasi dan business logic di Model/Controller
> - Bagian 3 → widget dashboard Filament + fitur ekspor PDF/Excel

---
