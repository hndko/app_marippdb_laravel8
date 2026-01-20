# Mari PPDB - Sistem Penerimaan Peserta Didik Baru Online

<p align="center">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

## 📖 Deskripsi Singkat

**Mari PPDB** adalah aplikasi web modern untuk memfasilitasi proses Penerimaan Peserta Didik Baru (PPDB) secara online. Dibangun menggunakan framework Laravel yang handal, aplikasi ini dirancang untuk memudahkan sekolah dalam mengelola pendaftaran siswa, pengumuman, dan komunikasi dengan calon wali murid, serta memberikan pengalaman pengguna yang seamless melalui antarmuka yang responsif dan interaktif.

## 🚀 Fitur Utama

### Halaman Depan (Public)

- **Landing Page Dinamis**: Halaman beranda yang menarik dengan Hero Section yang dapat dikonfigurasi.
- **Layanan & Fitur**: Informasi lengkap mengenai fasilitas dan keunggulan sekolah.
- **Testimoni & Tim**: Menampilkan ulasan wali murid dan profil tenaga pengajar.
- **Hubungi Kami**: Formulir kontak interaktif dan integrasi Google Maps dinamis.
- **Pengumuman**: Halaman khusus untuk informasi terbaru seputar PPDB.
- **SEO Ready**: Pengaturan Meta Title, Description, Keyword, dan OG Image yang dinamis untuk optimasi mesin pencari.

### Panel Admin (Backend)

- **Dashboard Informatif**: Ringkasan statistik pendaftaran dan pesan masuk.
- **Manajemen Konten**: CRUD untuk Pengumuman, Layanan, Fitur, Testimoni, dan Tim.
- **Data Siswa**: Pengelolaan data calon siswa yang terdaftar.
- **Pesan Masuk**: Kotak masuk untuk pertanyaan yang dikirim melalui formulir kontak.
- **Pengaturan Aplikasi**: Konfigurasi lengkap mulai dari identitas sekolah, jadwal PPDB, sosial media, hingga tampilan Hero dan SEO.
- **DataTables**: Integrasi DataTables pada semua halaman indeks untuk pencarian dan filter data yang cepat.

## 🛠 Teknologi yang Digunakan

- **Backend**: [Laravel 8](https://laravel.com) (PHP Framework)
- **Frontend**: Blade Templating, Bootstrap 5, Custom CSS
- **Database**: MySQL
- **Assets**:
    - [Remix Icon](https://remixicon.com) untuk ikon antarmuka.
    - [DataTables](https://datatables.net) untuk penyajian data tabel.
    - [SweetAlert2](https://sweetalert2.github.io) untuk notifikasi interaktif.

## 📦 Instalasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi di lingkungan lokal Anda:

1.  **Clone Repository**

    ```bash
    git clone https://github.com/username/app_marippdb_laravel8.git
    cd app_marippdb_laravel8
    ```

2.  **Install Dependensi**

    ```bash
    composer install
    ```

3.  **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database Anda.

    ```bash
    cp .env.example .env
    ```

4.  **Generate Key**

    ```bash
    php artisan key:generate
    ```

5.  **Migrasi & Seeding Database**
    Jalankan migrasi dan seeder untuk membuat tabel dan data awal (termasuk akun admin default).

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

6.  **Jalankan Server**
    ```bash
    php artisan serve
    ```
    Akses aplikasi melalui browser di `http://127.0.0.1:8000`.

## 🤝 Kontribusi & Laporan Bug

Kami sangat menghargai kontribusi Anda untuk mengembangkan proyek ini menjadi lebih baik.

### Melaporkan Bug

Jika Anda menemukan bug atau kesalahan pada aplikasi, silakan buat **Issue** baru di repository ini. Mohon sertakan detail langkah-langkah untuk mereproduksi bug tersebut agar kami dapat segera memperbaikinya.

### Request Fitur & Pull Request

Punya ide fitur baru atau ingin memperbaiki kode? Silakan berkontribusi dengan cara:

1.  Fork repository ini.
2.  Buat branch fitur baru (`git checkout -b fitur-keren`).
3.  Commit perubahan Anda (`git commit -m 'Menambahkan fitur keren'`).
4.  Push ke branch tersebut (`git push origin fitur-keren`).
5.  Buat **Pull Request** ke repository utama.

## 📄 Lisensi

Proyek ini bersifat open-source dan dilisensikan di bawah [MIT license](https://opensource.org/licenses/MIT).

---

<p align="center">
    Dibuat dengan ❤️ oleh Tim Pengembang Mari PPDB x Mari Partner
</p>
