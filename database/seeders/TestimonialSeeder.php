<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonials = [
            [
                'name' => 'Budi Santoso',
                'role' => 'Orang Tua Alumni 2023',
                'content' => 'Proses PPDB sangat transparan dan mudah. Saya sangat terbantu dengan adanya sistem online ini.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Siti Aminah',
                'role' => 'Siswa Kelas X',
                'content' => 'Website sangat user friendly, saya bisa mendaftar sendiri tanpa bantuan orang lain. Terima kasih!',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Rahmat Hidayat',
                'role' => 'Alumni Angkatan 2020',
                'content' => 'Bangga melihat kemajuan sekolah ini. Sistem penerimaan siswa baru nya sudah sangat modern.',
                'rating' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
