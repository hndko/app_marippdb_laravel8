<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            ['key' => 'app_name', 'value' => 'Mari PPDB'],
            ['key' => 'app_shortname', 'value' => 'MP'],
            ['key' => 'app_description', 'value' => 'Sistem Penerimaan Peserta Didik Baru Online Terpercaya.'],
            ['key' => 'school_phone', 'value' => '081234567890'],
            ['key' => 'school_email', 'value' => 'info@sekolah.com'],
            ['key' => 'school_address', 'value' => 'Jl. Pendidikan No. 1, Jakarta'],
            ['key' => 'registration_start_date', 'value' => '2024-01-01'],
            ['key' => 'registration_end_date', 'value' => '2024-12-31'],
            ['key' => 'announcement_date', 'value' => '2025-01-01'],
            ['key' => 'social_facebook', 'value' => '#'],
            ['key' => 'social_instagram', 'value' => '#'],
            ['key' => 'social_twitter', 'value' => '#'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], ['value' => $setting['value']]);
        }
    }
}
