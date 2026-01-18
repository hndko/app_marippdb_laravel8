<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'registration_number' => 'PPDB-' . $this->faker->unique()->numberBetween(10000, 99999),
            'nisn' => $this->faker->unique()->numerify('##########'), // 10 digits
            'nik' => $this->faker->unique()->numerify('16##############'), // 16 digits
            'full_name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'birth_place' => $this->faker->city(),
            'birth_date' => $this->faker->date(),
            'religion' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'school_origin' => 'SD ' . $this->faker->company(),
            'graduation_year' => $this->faker->year(),
            'jalur_pendaftaran' => $this->faker->randomElement(['Zonasi', 'Prestasi', 'Afirmasi', 'Pindah Tugas']),
            'status' => $this->faker->randomElement(['pending', 'verified', 'accepted', 'rejected']),
            'is_finalized' => $this->faker->boolean(80),
        ];
    }
}
