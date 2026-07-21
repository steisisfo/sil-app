# Rencana Otorisasi Role & Permission SIL-APP

Dokumen ini memetakan rencana implementasi Role dan Permission menggunakan `spatie/laravel-permission` untuk aplikasi sil-app berbasis Filament 5.

## 1. Definisi Role

Berdasarkan PRD dan struktur sistem saat ini, hanya ada dua entitas yang memiliki akses ke backend (Filament Admin Panel):

1.  **`admin`**: Memiliki akses penuh ke seluruh sistem, termasuk manajemen pengguna dan hak akses.
2.  **`content_creator`**: Memiliki akses penuh untuk mengelola seluruh konten website (CRUD) dan melihat analitik, namun **TIDAK BOLEH** mengakses atau mengelola pengguna dan role.

*(Catatan: Audiens lain seperti Masyarakat umum, Calon Mahasiswa, Mahasiswa, Dosen, Tendik, Alumni, dan Mitra adalah entitas frontend dan tidak dibuatkan role login di backend).*

## 2. Matriks Role-Permission

Setiap Resource Filament (dan model terkait) akan dilindungi dengan permission granular (`viewAny`, `view`, `create`, `update`, `delete`, `restore`, `forceDelete`). Kebijakan ini juga mempertimbangkan penggunaan *soft deletes*.

| Modul / Resource | Permission Prefix | `admin` | `content_creator` |
| :--- | :--- | :---: | :---: |
| **Users & Roles** | `user_*`, `role_*`, `permission_*` | Semua | ❌ (Tidak ada akses) |
| **Pages** | `page_*` | Semua | Semua |
| **Study Programs** | `study_program_*` | Semua | Semua |
| **Admissions** | `admission_*` | Semua | Semua |
| **Lecturers** | `lecturer_*` | Semua | Semua |
| **Research Groups**| `research_group_*` | Semua | Semua |
| **Research** | `research_*` | Semua | Semua |
| **Partnerships** | `partnership_*` | Semua | Semua |
| **News** | `news_*` | Semua | Semua |
| **Events** | `event_*` | Semua | Semua |
| **Announcements** | `announcement_*` | Semua | Semua |
| **Services** | `service_*` | Semua | Semua |
| **Analytics** | `analytics_*` (khusus `view`) | `view` | `view` |

*Keterangan "Semua" berarti memiliki 7 standar permission: `viewAny`, `view`, `create`, `update`, `delete`, `restore`, dan `forceDelete`.*

### Daftar Lengkap Permission (Contoh untuk satu resource, akan digenerate untuk semua):
- `viewAny {resource}`
- `view {resource}`
- `create {resource}`
- `update {resource}`
- `delete {resource}`
- `restore {resource}`
- `forceDelete {resource}`

## 3. Rencana Migrasi dari `users.role` Lama ke Spatie

Saat ini, role pada aplikasi dikelola melalui field `role` sederhana di tabel `users`. Kita perlu memigrasikannya ke struktur `spatie/laravel-permission` tanpa menghilangkan data akses pengguna yang ada.

### Urutan Migrasi

1.  **Instalasi Package & Publikasi Konfigurasi**:
    *   `composer require spatie/laravel-permission`
    *   Publikasi migration file dan konfigurasi dari Spatie.
    *   Tambahkan trait `HasRoles` pada model `User`.

2.  **Pembuatan Migration Sinkronisasi Data (Data-Preserving Migration)**:
    *   Buat file migration baru (misal: `MoveUserRoleToSpatie`).
    *   Di dalam method `up()` migration:
        *   Buat roles `admin` dan `content_creator` menggunakan model `Role` dari Spatie.
        *   Ambil semua pengguna yang ada di database.
        *   Lakukan iterasi: Jika `user->role == 'admin'`, assign role Spatie `admin`. Jika `user->role == 'content_creator'`, assign role Spatie `content_creator`.
    *   Di dalam method `down()` migration:
        *   Kosongkan tabel model_has_roles.

3.  **Penghapusan Kolom `role` Lama (Opsional/Tahap Berikutnya)**:
    *   Setelah diverifikasi bahwa semua role telah berpindah secara sempurna ke tabel Spatie, kita dapat membuat migration untuk men-drop kolom `role` lama di tabel `users` untuk kebersihan skema.

4.  **Pembuatan Seeder Permission & Role Default**:
    *   Buat `RoleAndPermissionSeeder` yang akan men-generate seluruh granular permission (seperti `viewAny news`, `create news`, dll).
    *   Assign semua permission ke role `admin`.
    *   Assign permission konten dan analitik ke role `content_creator`.
    *   Seeder ini dapat dijalankan kapan saja untuk me-reset ulang hak akses sesuai policy jika ada penambahan resource baru di masa depan.

5.  **Integrasi ke Filament**:
    *   Instal dan konfigurasikan plugin `bezhansalleh/filament-shield` (atau implementasi manual `Policy` untuk setiap model jika tidak menggunakan plugin). Plugin Shield sangat direkomendasikan karena dapat meng-generate policy dan permission Spatie secara otomatis berdasarkan Resource yang ada di Filament.

---

> **Tindakan yang Diperlukan:** Silakan tinjau matriks permission dan rencana migrasi di atas. Jika disetujui, tahap implementasi instalasi package dan migrasi data akan dijalankan.
