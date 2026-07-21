# Rencana Migrasi Bilingual (id/en) untuk sil-app

Dokumen ini merinci rencana teknis untuk menerapkan fitur multi-bahasa pada konten dinamis aplikasi `sil-app` menggunakan `spatie/laravel-translatable` dan `filament-spatie-translatable-plugin`. Tidak ada source code yang diubah pada tahap ini.

## Aturan Pemilihan Field Translatable
- **Translatable:** Teks panjang, kalimat, nama entitas yang berbeda dalam bahasa Inggris, deskripsi, abstrak, dll.
- **Scalar (Tidak diterjemahkan):** Slug, enum (status, kategori), ID, Foreign Key, tanggal/waktu, angka, URL, file path, email, NIP/NIDN, nama orang, nama mitra.
- **Deferred:** `admissions.faq` (karena berupa array JSON terstruktur, implementasi spatie-translatable memerlukan perlakuan khusus).

---

## 1. Analisis Model dan Field

### 1.1 Model `StudyProgram`
- **Translatable:** `name`, `description`, `curriculum_details`, `learning_outcomes`, `accreditation`, `degree_title`, `career_prospects`
- **Scalar:** `id`, `degree_level` (enum), `study_duration` (angka/string baku), `contact_info`, `created_at`, `updated_at`, `deleted_at`
- **Alasan Bisnis:** Nama prodi, deskripsi, kurikulum, akreditasi, dan prospek karir sangat bergantung pada bahasa. Level S1/S2/S3, durasi, dan kontak tetap baku.
- **Dampak Resource:** `StudyProgramResource`, Form, Table, Infolist perlu ditambahkan trait dan komponen translatable.
- **Dampak Seeder:** `StudyProgramSeeder` harus disesuaikan menjadi bentuk array `['id' => '...', 'en' => '']`.
- **Relasi sebagai Title:** Digunakan di `LecturerForm` dan `LecturersTable` (`relationship('studyProgram', 'name')`).

### 1.2 Model `ResearchGroup`
- **Translatable:** `name`, `description`
- **Scalar:** `id`, `created_at`, `updated_at`, `deleted_at`
- **Alasan Bisnis:** Nama KK dan deskripsi bervariasi antara bahasa.
- **Dampak Resource:** `ResearchGroupResource`, Form, Table.
- **Dampak Seeder:** `ResearchGroupSeeder`.
- **Relasi sebagai Title:** Digunakan di `Lecturer`, `Research`.

### 1.3 Model `Page`
- **Translatable:** `title`, `content`
- **Scalar:** `id`, `slug`, `image`, `status`, `author_id`, `published_at`, timestamps
- **Alasan Bisnis:** Slug harus skalar untuk rute yang konsisten. `title` dan `content` bervariasi.
- **Dampak Resource:** `PageResource`, Form, Table.
- **Dampak Seeder:** `PageSeeder`.

### 1.4 Model `Admission`
- **Translatable:** `selection_path`, `admission_requirements`
- **Scalar:** `id`, `degree_level`, `start_date`, `end_date`, `tuition_fee`, `capacity`, `external_link`, `contact_info`, `status`, timestamps
- **Deferred:** `faq` (sudah JSON terstruktur, lewati untuk iterasi pertama).
- **Alasan Bisnis:** Nama jalur dan syarat pendaftaran berbeda, namun biaya, kapasitas, URL pendaftaran eksternal dan periode tetap skalar.
- **Dampak Resource:** `AdmissionResource`, Form, Table, Infolist.
- **Dampak Seeder:** `AdmissionSeeder`.

### 1.5 Model `Lecturer`
- **Translatable:** `functional_position`, `research_fields`, `lab_managed`
- **Scalar:** `id`, `name` (nama orang), `nip`, `nidn`, `study_program_id`, `research_group_id`, `email`, `photo`, `scopus_link`, `google_scholar_link`, `sinta_link`, `status`, timestamps
- **Alasan Bisnis:** Jabatan (Lektor/Asisten Ahli vs Associate Professor), bidang riset, dan lab diasuh bisa diterjemahkan. NIP, NIDN, nama orang, dan tautan publikasi tidak.
- **Dampak Resource:** `LecturerResource`, Form, Table, Infolist.
- **Dampak Seeder:** `LecturerSeeder`.

### 1.6 Model `Research`
- **Translatable:** `title`, `abstract`
- **Scalar:** `id`, `year`, `type`, `document_link`, `funding_source` (nama lembaga pendana, umumnya tidak diterjemahkan), `status`, `research_group_id`, timestamps
- **Alasan Bisnis:** Judul dan abstrak riset memerlukan terjemahan. Sumber pendanaan (misal LPDP) adalah entitas baku.
- **Dampak Resource:** `ResearchResource`, Form, Table.
- **Dampak Seeder:** `ResearchSeeder`.

### 1.7 Model `Partnership`
- **Translatable:** `description`
- **Scalar:** `id`, `partner_name` (nama mitra), `partnership_type`, `start_date`, `end_date`, `contact_info`, `logo`, `document_file`, `status`, timestamps
- **Alasan Bisnis:** Nama institusi mitra tidak diterjemahkan. Hanya deskripsi aktivitas yang diterjemahkan.
- **Dampak Resource:** `PartnershipResource`, Form, Table.
- **Dampak Seeder:** `PartnershipSeeder`.

### 1.8 Model `News`
- **Translatable:** `title`, `content`
- **Scalar:** `id`, `slug`, `image`, `category`, `tags`, `author_id`, `status`, `published_at`, `views_count`, timestamps
- **Alasan Bisnis:** Judul dan konten adalah teks berita. `tags` dibiarkan skalar karena berupa CSV string; `category` adalah enum.
- **Dampak Resource:** `NewsResource`, Form, Table.
- **Dampak Seeder:** `NewsSeeder`.

### 1.9 Model `Event`
- **Translatable:** `name`, `location`, `description`
- **Scalar:** `id`, `slug`, `type`, `start_datetime`, `end_datetime`, `registration_link`, `speakers` (nama orang), `organizer`, `poster`, `status`, timestamps
- **Alasan Bisnis:** Nama acara, nama lokasi (misal "Gedung" ke "Building"), dan deskripsi diterjemahkan. Nama pembicara dan penyelenggara dibiarkan skalar.
- **Dampak Resource:** `EventResource`, Form, Table.
- **Dampak Seeder:** `EventSeeder`.

### 1.10 Model `Announcement`
- **Translatable:** `title`, `content`
- **Scalar:** `id`, `slug`, `target_audience`, `valid_from`, `valid_until`, `attachment_file`, `priority`, `status`, `is_pinned`, `author_id`, timestamps
- **Alasan Bisnis:** Serupa dengan News dan Page.
- **Dampak Resource:** `AnnouncementResource`, Form, Table, Infolist.
- **Dampak Seeder:** `AnnouncementSeeder`.

### 1.11 Model `Service`
- **Translatable:** `name`, `description`, `procedure`
- **Scalar:** `id`, `category`, `related_link`, `pic_contact` (nama orang), `document_file`, `status`, timestamps
- **Alasan Bisnis:** Layanan, prosedur, dan deskripsinya butuh terjemahan. Kontak PIC adalah nama staf (skalar).
- **Dampak Resource:** `ServiceResource`, Form, Table.
- **Dampak Seeder:** `ServiceSeeder`.

---

## 2. Risiko Search / Sort pada Database
- `spatie/laravel-translatable` menyimpan field terjemahan sebagai struktur JSON (MySQL/PostgreSQL) atau `text` yang berisi JSON.
- **Sorting (Order By):** 
  Jika di-sort secara bawaan menggunakan DB engine tanpa fungsi JSON khusus, urutan akan didasarkan pada raw string JSON (seperti `{"id": "A..."}`). Pada Filament, komponen Translatable telah menangani masalah ini pada UI, tapi sort di backend database mungkin tidak seakurat sort string biasa (terutama di MariaDB/MySQL).
- **Searching (Where Like):**
  Pencarian dengan `LIKE '%keyword%'` pada kolom JSON akan mencari pada semua locale (termasuk kunci seperti `"id"` atau `"en"`). Filament otomatis memanfaatkan operator `JSON_EXTRACT` jika didefinisikan sebagai kolom *searchable translatable*.
- **Relasi Title:**
  Komponen `Select::make('research_group_id')->relationship('researchGroup', 'name')` pada Filament perlu sedikit trik saat field `name` berbentuk JSON agar label yang muncul sesuai locale yang sedang aktif, biasanya Filament memanggil `getTranslation()` otomatis.

---

## 3. Rencana Eksekusi Migration (Urutan Aman)

Karena ada data di dalam tabel (yang digenerate Seeder), mengubah langsung tipe data kolom dari `string`/`text` menjadi `json` akan menyebabkan error di MySQL ("Invalid JSON text..."). Kita tidak boleh menggunakan `migrate:fresh`.
Strategi migrasi (Data Preservation):
1. Baca semua baris pada tabel.
2. Simpan nilai lama kolom translatable dalam variabel memori/koleksi (hanya jika recordnya sedikit) atau lakukan bulk update.
3. Ubah struktur kolom menjadi `text` (karena JSON dapat disimpan sebagai text tanpa batasan validasi ketat, atau `json` jika dijamin semua format sudah menjadi JSON melalui script).
4. Update kembali semua record dengan menyusun JSON `{"id": "nilai lama", "en": null}`.

**Urutan Migration yang Direkomendasikan:**
1. `2026_07_21_040001_make_study_programs_translatable.php`
2. `2026_07_21_040002_make_research_groups_translatable.php`
3. `2026_07_21_040003_make_pages_translatable.php`
4. `2026_07_21_040004_make_admissions_translatable.php`
5. `2026_07_21_040005_make_lecturers_translatable.php`
6. `2026_07_21_040006_make_researches_translatable.php`
7. `2026_07_21_040007_make_partnerships_translatable.php`
8. `2026_07_21_040008_make_news_translatable.php`
9. `2026_07_21_040009_make_events_translatable.php`
10. `2026_07_21_040010_make_announcements_translatable.php`
11. `2026_07_21_040011_make_services_translatable.php`

Masing-masing migration akan berisi script konversi dari string ke format JSON terstruktur untuk locale `id`.

---

## 4. Daftar Pertanyaan & Blokir (Review Required)

> [!WARNING]
> Sebelum eksekusi, mohon konfirmasi untuk item berikut:
> 1. **Strategi Konversi Migrasi:** Apakah diizinkan menggunakan script raw DB (misal menggunakan loop foreach `DB::table('pages')->get()` dan `DB::table('pages')->where('id', $row->id)->update(['title' => json_encode(['id' => $row->title, 'en' => null])])`) di dalam fungsi `up()` pada file migration?
> 2. **Tipe Data:** Apakah tipe kolom sebaiknya dibiarkan `text`/`longText` atau secara eksplisit diubah menjadi `json` melalui `Schema::table`? Mengubah langsung ke tipe `json` pada database yang sudah ada isinya sering menyebabkan constraint error pada beberapa versi MySQL. Mengonversi data dulu sebelum melakukan `change()` bisa menjadi solusi.
> 3. **Seeder Updates:** Karena Anda mengatakan "Jangan jalankan `migrate:fresh`", apakah update pada Seeder hanya ditujukan jika suatu saat sistem perlu diinisialisasi ulang dari awal? Ataukah kita perlu menjalankan seeder lagi? (Dalam rencana ini saya mengasumsikan seeder diupdate sebagai maintenance kode, tapi tidak dieksekusi).
