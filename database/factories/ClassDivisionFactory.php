<?php

namespace Database\Factories;

use App\Models\ClassDivision;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassDivisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->regexify('[' . ClassDivision::CLASS_DIVISIONS_RENGE . ']{1}'),
        ];
    }
}
