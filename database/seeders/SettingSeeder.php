<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['key' => 'school_name', 'value' => 'SMA Negeri 1 Contoh'],
            ['key' => 'school_address', 'value' => 'Jl. Pendidikan No. 1'],
            ['key' => 'ppdb_open_date', 'value' => '2024-06-01'],
            ['key' => 'ppdb_close_date', 'value' => '2024-06-30'],
            ['key' => 'quota_zonasi', 'value' => '50'],
            ['key' => 'quota_prestasi', 'value' => '30'],
            ['key' => 'quota_afirmasi', 'value' => '15'],
            ['key' => 'quota_pindah_tugas', 'value' => '5'],
        ];

        DB::table('settings')->insert($settings);
    }
}
