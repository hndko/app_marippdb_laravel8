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
            ['key' => 'google_maps_embed', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.452622763567!2d106.81666631476906!3d-6.203875995509373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6a2e4a2b135%3A0x6b4f7e2c9e8d1b0!2sMonas!5e0!3m2!1sen!2sid!4v1645000000000!5m2!1sen!2sid'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], ['value' => $setting['value']]);
        }
    }
}
