<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\StudentParent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Create 1 Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        // 2. Create 1 Operator
        User::create([
            'name' => 'Operator Sekolah',
            'email' => 'operator@example.com',
            'role' => 'operator',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        // 3. Create 10 Students with Parents
        User::factory(10)->create()->each(function ($user) {
            $student = Student::factory()->create(['user_id' => $user->id]);
            StudentParent::factory()->create(['student_id' => $student->id]);
        });

        // 4. Run Settings Seeder
        $this->call([
            SettingSeeder::class,
        ]);
    }
}
