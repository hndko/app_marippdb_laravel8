<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'name' => 'Dr. Budi Santoso, M.Pd.',
                'position' => 'Kepala Sekolah',
                'bio' => 'Berpengalaman lebih dari 20 tahun dalam dunia pendidikan dan manajemen sekolah.',
                'twitter_link' => 'https://twitter.com',
                'facebook_link' => 'https://facebook.com',
                'instagram_link' => 'https://instagram.com',
                'linkedin_link' => 'https://linkedin.com',
                'is_active' => true,
            ],
            [
                'name' => 'Siti Aminah, S.Pd.',
                'position' => 'Wakil Kurikulum',
                'bio' => 'Fokus pada pengembangan kurikulum yang adaptif dan inovatif bagi siswa.',
                'twitter_link' => 'https://twitter.com',
                'facebook_link' => 'https://facebook.com',
                'instagram_link' => 'https://instagram.com',
                'linkedin_link' => 'https://linkedin.com',
                'is_active' => true,
            ],
            [
                'name' => 'Rahmat Hidayat, S.Kom.',
                'position' => 'Kepala IT & Operator',
                'bio' => 'Ahli dalam pengembangan sistem informasi dan teknologi pembelajaran.',
                'twitter_link' => 'https://twitter.com',
                'facebook_link' => 'https://facebook.com',
                'instagram_link' => 'https://instagram.com',
                'linkedin_link' => 'https://linkedin.com',
                'is_active' => true,
            ],
            [
                'name' => 'Dewi Sartika, M.psi',
                'position' => 'Guru BK',
                'bio' => 'Berdedikasi untuk membantu perkembangan mental dan karakter siswa.',
                'twitter_link' => 'https://twitter.com',
                'facebook_link' => 'https://facebook.com',
                'instagram_link' => 'https://instagram.com',
                'linkedin_link' => 'https://linkedin.com',
                'is_active' => true,
            ],
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}
