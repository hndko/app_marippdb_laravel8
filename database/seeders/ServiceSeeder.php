<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'title' => 'Pendaftaran Online',
                'description' => 'Sistem pendaftaran yang dapat diakses kapan saja dan dimana saja.',
                'icon' => 'ri-pencil-ruler-2-line',
                'is_active' => true,
            ],
            [
                'title' => 'Pengumuman Realtime',
                'description' => 'Pantau hasil seleksi secara langsung melalui website.',
                'icon' => 'ri-palette-line',
                'is_active' => true,
            ],
            [
                'title' => 'Verifikasi Berkas',
                'description' => 'Proses verifikasi berkas yang cepat dan transparan oleh panitia.',
                'icon' => 'ri-lightbulb-flash-line',
                'is_active' => true,
            ],
            [
                'title' => 'Tes Akademik Online',
                'description' => 'Pelaksanaan tes akademik berbasis komputer (CBT).',
                'icon' => 'ri-computer-line',
                'is_active' => true,
            ],
            [
                'title' => 'Pembayaran Virtual',
                'description' => 'Pembayaran biaya pendaftaran melalui Virtual Account.',
                'icon' => 'ri-bank-card-line',
                'is_active' => true,
            ],
            [
                'title' => 'Layanan Bantuan',
                'description' => 'Tim support yang siap membantu kendala pendaftaran Anda.',
                'icon' => 'ri-customer-service-2-line',
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
