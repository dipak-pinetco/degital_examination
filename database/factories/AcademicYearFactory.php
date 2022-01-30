<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startYear = Carbon::createFromFormat('Y', $this->faker->year);
        return [
            'academic_year' => $startYear->format('Y') . '-' . $startYear->addYear()->format('Y'),
        ];
    }
}
