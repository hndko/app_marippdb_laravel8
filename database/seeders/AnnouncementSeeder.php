<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;
use Illuminate\Support\Str;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $announcements = [
            [
                'title' => 'Pendaftaran PPDB Tahun Ajaran 2024/2025 Telah Dibuka',
                'content' => 'Kami dengan bangga mengumumkan bahwa pendaftaran peserta didik baru untuk tahun ajaran 2024/2025 telah resmi dibuka. Silakan lengkapi formulir pendaftaran dan unggah dokumen yang diperlukan. Pastikan data yang Anda masukkan sudah benar.',
                'image' => null,
                'is_active' => true,
            ],
            [
                'title' => 'Jadwal Tes Seleksi Masuk',
                'content' => 'Tes seleksi masuk akan dilaksanakan pada tanggal 15 Juli 2024. Peserta diharapkan hadir 30 menit sebelum jadwal yang ditentukan. Bawa kartu bukti pendaftaran dan alat tulis lengkap. Informasi ruang ujian dapat dilihat di papan pengumuman sekolah atau melalui dashboard akun Anda.',
                'image' => null,
                'is_active' => true,
            ],
            [
                'title' => 'Panduan Pembayaran Biaya Pendaftaran',
                'content' => 'Pembayaran biaya pendaftaran dapat dilakukan melalui transfer bank ke rekening Yayasan. Mohon simpan bukti transfer untuk dilakukan verifikasi oleh panitia. Detail rekening dapat dilihat pada menu "Informasi Pembayaran" setelah Anda login.',
                'image' => null,
                'is_active' => true,
            ],
            [
                'title' => 'Pengumuman Hasil Seleksi Administrasi',
                'content' => 'Hasil seleksi administrasi tahap 1 akan diumumkan pada tanggal 5 Juli 2024. Bagi peserta yang lolos, diharapkan mencetak kartu ujian untuk mengikuti tes seleksi berikutnya.',
                'image' => null,
                'is_active' => false, // Contoh pengumuman draft/tidak aktif
            ],
        ];

        foreach ($announcements as $item) {
            Announcement::updateOrCreate(
                ['slug' => Str::slug($item['title'])],
                [
                    'title' => $item['title'],
                    'content' => $item['content'],
                    'image' => $item['image'],
                    'is_active' => $item['is_active'],
                ]
            );
        }
    }
}
