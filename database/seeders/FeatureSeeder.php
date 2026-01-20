<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [
            [
                'title' => 'Pendaftaran Mudah',
                'description' => 'Proses pendaftaran yang simpel dan bisa dilakukan di mana saja.',
                'icon' => 'ri-pencil-ruler-2-line',
                'is_active' => true,
            ],
            [
                'title' => 'Antarmuka Modern',
                'description' => 'Tampilan aplikasi yang user-friendly dan menarik.',
                'icon' => 'ri-palette-line',
                'is_active' => true,
            ],
            [
                'title' => 'Pengelolaan Data',
                'description' => 'Manajemen data siswa yang efisien dan terstruktur.',
                'icon' => 'ri-lightbulb-flash-line',
                'is_active' => true,
            ],
            [
                'title' => 'Informasi Transparan',
                'description' => 'Dapatkan informasi terkini mengenai status pendaftaran Anda.',
                'icon' => 'ri-global-line',
                'is_active' => true,
            ],
        ];

        foreach ($features as $feature) {
            \App\Models\Feature::create($feature);
        }
    }
}
