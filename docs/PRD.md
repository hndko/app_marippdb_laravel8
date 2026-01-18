# Product Requirements Document (PRD) - Aplikasi PPDB

## 1. Pendahuluan

Aplikasi Penerimaan Peserta Didik Baru (PPDB) ini dirancang untuk jenjang SD, SMP, SMA, dan SMK. Aplikasi ini bertujuan untuk mempermudah proses pendaftaran, seleksi, dan pengelolaan data calon siswa baru secara online.

## 2. Pengguna (User Roles)

1.  **Super Admin**: Akses penuh ke seluruh sistem, konfigurasi sekolah.
2.  **Admin/Operator Sekolah**: Verifikasi berkas, kelola data siswa, pengumuman.
3.  **Calon Siswa**: Mendaftar, mengisi formulir, upload berkas, melihat pengumuman.

## 3. Fitur Utama & Prioritas Pengerjaan

Fitur diurutkan berdasarkan prioritas eksekusi (dependencies):

### Fase 1: Core & Authentication

1.  **Authentication & Authorization**
    - Login (Admin, Siswa).
    - Register (Calon Siswa).
    - Multi-role middleware.
2.  **Dashboard Dasar**
    - Admin: Statistik ringkas.
    - Siswa: Status pendaftaran.

### Fase 2: Manajemen Data Siswa (Inti)

3.  **Formulir Pendaftaran (Wizard)**
    - Data Pribadi (NIK, Nama, TTL, dll).
    - Data Alamat.
    - Data Orang Tua / Wali.
    - Data Asal Sekolah & Nilai (Rapor/UN).
    - Upload Berkas (KK, Akta, Foto, dll).
4.  **Manajemen Data Siswa (Admin View)**
    - CRUD (Create - jarang dipakai admin, Read, Update, Delete).
    - **Filter**: Berdasarkan Status (Diterima/Verifikasi/Pending), Jalur Masuk (Zonasi/Prestasi/dll).
    - **Paging**: Server-side pagination.

### Fase 3: Proses Seleksi & Pengumuman

5.  **Verifikasi Berkas**
    - Admin memvalidasi data yang diinput siswa.
    - Status change: Verified / Rejected (dengan alasan).
6.  **Pengumuman / Seleksi**
    - Fitur untuk menetapkan status Akhir (Diterima / Tidak).
    - Cetak Bukti Diterima.

### Fase 4: Pengaturan & Laporan

7.  **Pengaturan Sekolah**
    - Set Kuota, Jalur Pendaftaran, Tanggal Buka/Tutup.
8.  **Laporan / Export**
    - Export data siswa ke Excel/PDF.

## 4. Alur Kerja (High Level)

1.  Siswa Register -> Login.
2.  Siswa Isi Formulir -> Upload Berkas -> Submit / Finalisasi.
3.  Admin Verifikasi Berkas -> Valid/Invalid.
4.  Sistem/Admin melakukan Seleksi (Ranking/Sortir).
5.  Admin Publish Pengumuman.
6.  Siswa Cek Hasil.

## 5. Technology Stack

- **Backend**: Laravel (PHP).
- **Database**: MySQL.
- **Frontend**: Blade Templates + Bootstrap/Tailwind (Sesuai Layout).
