<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $totalMarks = $this->faker->randomElement([100, 70, 50, 30, 20]);
        return [
            'name' => $this->faker->streetName(),
            'start_date_time' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'total_time' => $this->faker->randomElement([180, 150, 120, 90, 60, 30]),
            'total_marks' => $totalMarks,
            'passout_marks' => $totalMarks * 0.35,
        ];
    }
}
