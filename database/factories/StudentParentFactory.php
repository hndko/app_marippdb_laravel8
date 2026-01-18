<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentParentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'father_name' => $this->faker->name('male'),
            'father_nik' => $this->faker->numerify('16##############'),
            'father_job' => $this->faker->jobTitle(),
            'father_phone' => $this->faker->phoneNumber(),
            'mother_name' => $this->faker->name('female'),
            'mother_nik' => $this->faker->numerify('16##############'),
            'mother_job' => $this->faker->jobTitle(),
            'mother_phone' => $this->faker->phoneNumber(),
            'guardian_name' => null,
        ];
    }
}
