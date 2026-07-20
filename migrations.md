# Rancangan Database (Laravel Migrations)
Sistem: Website Informasi Publik STEI ITB

## Panduan Umum
- Penamaan tabel menggunakan bahasa Inggris, bentuk jamak (plural), dan format `snake_case`.
- Tipe data disesuaikan dengan standar tipe kolom pada Blueprint Laravel.
- Kolom `created_at` dan `updated_at` dihasilkan dari method `$table->timestamps()`.
- Kolom `deleted_at` dihasilkan dari method `$table->softDeletes()` untuk *soft deletion*.
- Urutan tabel disusun dari *Master Tables* (tidak memiliki ketergantungan) menuju ke *Transaction Tables* (memiliki *Foreign Key* ke tabel lain).

---

## A. Master Tables

### 1. `users`
Menyimpan data pengguna sistem (Administrator, Pengelola Konten).

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `name` | `string` | Nama pengguna |
| `email` | `string` | Alamat email (Unique) |
| `password` | `string` | Password |
| `role` | `enum` | Peran pengguna: `'admin'`, `'content_creator'` |
| `remember_token` | `string` | Token untuk fitur remember me (Nullable) |
| `created_at` | `timestamp` | Waktu pembuatan |
| `updated_at` | `timestamp` | Waktu pembaruan |
| `deleted_at` | `timestamp` | Soft deletes (Nullable) |

### 2. `study_programs`
Menyimpan daftar program studi.

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `name` | `string` | Nama program studi |
| `degree_level` | `enum` | Jenjang studi: `'S1'`, `'S2'`, `'S3'` |
| `description` | `text` | Deskripsi program studi |
| `curriculum_details` | `text` | Kurikulum dan daftar mata kuliah (Nullable) |
| `learning_outcomes` | `text` | Capaian pembelajaran (Nullable) |
| `accreditation` | `string` | Status dan lembaga akreditasi |
| `degree_title` | `string` | Gelar yang diperoleh (Nullable) |
| `study_duration` | `string` | Durasi studi (Nullable) |
| `career_prospects` | `text` | Prospek karir (Nullable) |
| `contact_info` | `string` | Kontak program studi |
| `created_at` | `timestamp` | Waktu pembuatan |
| `updated_at` | `timestamp` | Waktu pembaruan |
| `deleted_at` | `timestamp` | Soft deletes (Nullable) |

### 3. `research_groups`
Menyimpan daftar Kelompok Keahlian (KK).

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `name` | `string` | Nama kelompok keahlian |
| `description` | `text` | Deskripsi kelompok keahlian (Nullable) |
| `created_at` | `timestamp` | Waktu pembuatan |
| `updated_at` | `timestamp` | Waktu pembaruan |
| `deleted_at` | `timestamp` | Soft deletes (Nullable) |

---

## B. Transaction / Content Tables

### 4. `pages`
Menyimpan konten halaman statis (Informasi Profil Institusi, Visi Misi, dll).

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `title` | `string` | Judul halaman |
| `slug` | `string` | Slug URL (Unique, Index) |
| `content` | `longText` | Isi konten |
| `image` | `string` | Gambar utama (Nullable) |
| `status` | `enum` | Status publikasi: `'draft'`, `'published'`, `'archived'` (Default: `'draft'`) |
| `author_id` | `foreignId` | FK ke `users.id` (Nullable) |
| `published_at` | `timestamp` | Waktu dipublikasikan (Nullable) |
| `created_at` | `timestamp` | Waktu pembuatan |
| `updated_at` | `timestamp` | Waktu pembaruan |
| `deleted_at` | `timestamp` | Soft deletes (Nullable) |

### 5. `admissions`
Menyimpan informasi penerimaan mahasiswa baru.

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `selection_path` | `string` | Jalur seleksi (cth: SNBP, Mandiri) |
| `degree_level` | `enum` | Jenjang studi: `'S1'`, `'S2'`, `'S3'` |
| `admission_requirements`| `text` | Persyaratan masuk |
| `start_date` | `date` | Tanggal pendaftaran dibuka |
| `end_date` | `date` | Tanggal pendaftaran ditutup |
| `tuition_fee` | `decimal` | Biaya pendidikan (Nullable) |
| `capacity` | `integer` | Daya tampung (Nullable) |
| `external_link` | `string` | Tautan resmi pendaftaran |
| `faq` | `json` | Tanya jawab terkait (Nullable) |
| `contact_info` | `string` | Kontak informasi (Nullable) |
| `status` | `enum` | Status periode: `'active'`, `'archived'` (Default: `'active'`) |
| `created_at` | `timestamp` | Waktu pembuatan |
| `updated_at` | `timestamp` | Waktu pembaruan |
| `deleted_at` | `timestamp` | Soft deletes (Nullable) |

### 6. `lecturers`
Menyimpan direktori dosen dan profilnya.

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `name` | `string` | Nama dosen |
| `nip` | `string` | NIP (Nullable, Unique) |
| `nidn` | `string` | NIDN (Nullable, Unique) |
| `functional_position` | `string` | Jabatan fungsional |
| `study_program_id`| `foreignId` | FK ke `study_programs.id` |
| `research_group_id`| `foreignId` | FK ke `research_groups.id` (Nullable) |
| `research_fields` | `string` | Bidang riset (Nullable) |
| `email` | `string` | Email dosen (Unique) |
| `photo` | `string` | Foto profil (Nullable) |
| `scopus_link` | `string` | Link profil Scopus |
| `google_scholar_link` | `string` | Link profil Google Scholar |
| `sinta_link` | `string` | Link profil SINTA |
| `lab_managed` | `string` | Laboratorium yang diasuh (Nullable) |
| `status` | `enum` | Status dosen: `'active'`, `'retired'`, `'mutated'` (Default: `'active'`) |
| `created_at` | `timestamp` | Waktu pembuatan |
| `updated_at` | `timestamp` | Waktu pembaruan |
| `deleted_at` | `timestamp` | Soft deletes (Nullable) |

### 7. `researches`
Menyimpan data penelitian, proyek riset, dan publikasi.

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `title` | `string` | Judul penelitian / publikasi |
| `abstract` | `text` | Abstrak (Nullable) |
| `year` | `year` / `integer`| Tahun publikasi/riset |
| `type` | `enum` | Jenis: `'journal'`, `'conference'`, `'book'`, `'patent'`, `'research_project'` |
| `document_link` | `string` | Tautan dokumen/DOI/Repositori (Nullable) |
| `funding_source` | `string` | Sumber pendanaan (Nullable) |
| `status` | `enum` | Status proyek: `'ongoing'`, `'completed'` (Default: `'completed'`) |
| `research_group_id`| `foreignId` | FK ke `research_groups.id` (Nullable) |
| `created_at` | `timestamp` | Waktu pembuatan |
| `updated_at` | `timestamp` | Waktu pembaruan |
| `deleted_at` | `timestamp` | Soft deletes (Nullable) |

### 8. `lecturer_research` (Pivot Table)
Tabel relasi many-to-many antara dosen dan penelitian (Penulis).

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `research_id` | `foreignId` | FK ke `researches.id` |
| `lecturer_id` | `foreignId` | FK ke `lecturers.id` |
| `is_primary_author` | `boolean` | Menandai penulis utama (Default: `false`) |

*(Catatan: Primary Key adalah composite dari `research_id` dan `lecturer_id`)*

### 9. `partnerships`
Menyimpan informasi kerja sama dan kemitraan institusi.

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `partner_name` | `string` | Nama mitra |
| `partnership_type`| `enum` | Jenis: `'research'`, `'education'`, `'industry'`, `'international'` |
| `start_date` | `date` | Tanggal mulai kerja sama |
| `end_date` | `date` | Tanggal berakhir (Nullable) |
| `description` | `text` | Deskripsi kegiatan |
| `contact_info` | `string` | Kontak PIC kerja sama (Nullable) |
| `logo` | `string` | Logo mitra (Nullable) |
| `document_file` | `string` | Dokumen MoU/MoA publik (Nullable) |
| `status` | `enum` | Status: `'active'`, `'ended'` (Default: `'active'`) |
| `created_at` | `timestamp` | Waktu pembuatan |
| `updated_at` | `timestamp` | Waktu pembaruan |
| `deleted_at` | `timestamp` | Soft deletes (Nullable) |

### 10. `news`
Menyimpan berita, artikel, dan liputan.

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `title` | `string` | Judul berita |
| `slug` | `string` | Slug URL (Unique, Index) |
| `content` | `longText` | Isi berita |
| `image` | `string` | Gambar utama |
| `category` | `enum` | Kategori: `'academic'`, `'research'`, `'student_affairs'`, `'general'` |
| `tags` | `string` | Tag/kata kunci (Nullable) |
| `author_id` | `foreignId` | FK ke `users.id` |
| `status` | `enum` | Status: `'draft'`, `'published'`, `'archived'` (Default: `'draft'`) |
| `published_at` | `timestamp` | Tanggal terbit (Nullable) |
| `views_count` | `integer` | Jumlah dilihat (Default: `0`) |
| `created_at` | `timestamp` | Waktu pembuatan |
| `updated_at` | `timestamp` | Waktu pembaruan |
| `deleted_at` | `timestamp` | Soft deletes (Nullable) |

### 11. `events`
Menyimpan informasi agenda dan acara.

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `name` | `string` | Nama acara |
| `slug` | `string` | Slug URL (Unique, Index) |
| `type` | `enum` | Jenis: `'seminar'`, `'workshop'`, `'graduation'`, `'competition'`, `'other'` |
| `start_datetime` | `dateTime` | Tanggal & waktu mulai |
| `end_datetime` | `dateTime` | Tanggal & waktu selesai |
| `location` | `string` | Lokasi (fisik/daring) |
| `description` | `text` | Deskripsi acara |
| `registration_link`| `string` | Tautan pendaftaran/streaming (Nullable) |
| `speakers` | `string` | Pembicara/Narasumber (Nullable) |
| `organizer` | `string` | Penyelenggara acara (Nullable) |
| `poster` | `string` | Gambar/poster (Nullable) |
| `status` | `enum` | Status: `'upcoming'`, `'ongoing'`, `'completed'` (Default: `'upcoming'`) |
| `created_at` | `timestamp` | Waktu pembuatan |
| `updated_at` | `timestamp` | Waktu pembaruan |
| `deleted_at` | `timestamp` | Soft deletes (Nullable) |

### 12. `announcements`
Menyimpan data pengumuman resmi.

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `title` | `string` | Judul pengumuman |
| `slug` | `string` | Slug URL (Unique, Index) |
| `content` | `text` | Isi pengumuman |
| `target_audience` | `enum` | Target: `'students'`, `'lecturers'`, `'staff'`, `'general'` |
| `valid_from` | `dateTime` | Mulai berlaku (Nullable) |
| `valid_until` | `dateTime` | Selesai berlaku (Nullable) |
| `attachment_file` | `string` | Lampiran file PDF (Nullable) |
| `priority` | `enum` | Prioritas: `'normal'`, `'important'`, `'urgent'` (Default: `'normal'`) |
| `status` | `enum` | Status: `'draft'`, `'published'`, `'archived'` (Default: `'draft'`) |
| `is_pinned` | `boolean` | Apakah di-pin di atas? (Default: `false`) |
| `author_id` | `foreignId` | FK ke `users.id` |
| `created_at` | `timestamp` | Waktu pembuatan |
| `updated_at` | `timestamp` | Waktu pembaruan |
| `deleted_at` | `timestamp` | Soft deletes (Nullable) |

### 13. `services`
Menyimpan layanan akademik dan kemahasiswaan.

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `name` | `string` | Nama layanan |
| `category` | `enum` | Kategori: `'academic'`, `'student_affairs'` |
| `description` | `text` | Deskripsi layanan |
| `procedure` | `text` | Prosedur/panduan layanan (Nullable) |
| `related_link` | `string` | Tautan ke sistem eksternal (Nullable) |
| `pic_contact` | `string` | Kontak PIC (No. Telp / Email) |
| `document_file` | `string` | Dokumen panduan PDF/formulir (Nullable) |
| `status` | `enum` | Status: `'active'`, `'inactive'` (Default: `'active'`) |
| `created_at` | `timestamp` | Waktu pembuatan |
| `updated_at` | `timestamp` | Waktu pembaruan |
| `deleted_at` | `timestamp` | Soft deletes (Nullable) |

---

## C. System / Log Tables (Untuk Pelaporan Dashboard)

### 14. `visitors`
Menyimpan log kunjungan untuk laporan statistik.

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `ip_address` | `string` | IP pengunjung |
| `user_agent` | `string` | Browser/Device pengunjung (Nullable) |
| `page_url` | `string` | URL halaman yang dikunjungi |
| `visited_at` | `timestamp` | Waktu kunjungan (Index) |
| `created_at` | `timestamp` | Waktu perekaman log |

### 15. `search_logs`
Menyimpan histori pencarian pengunjung.

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id` | `id()` / `bigint` | Primary Key |
| `keyword` | `string` | Kata kunci yang dicari (Index) |
| `results_count` | `integer` | Jumlah hasil pencarian yang ditemukan |
| `searched_at` | `timestamp` | Waktu pencarian (Index) |
| `created_at` | `timestamp` | Waktu perekaman log |
