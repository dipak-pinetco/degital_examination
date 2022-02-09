<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(User::getEnum('gender')),
            'date_of_birth' => $this->faker->dateTimeBetween('1990-01-01', '2017-12-31'),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'mobile' => $this->faker->phoneNumber(),
            'remember_token' => Str::random(10),
            'degree' => $this->faker->word(),
            'status' => 1,
        ];
    }
}
