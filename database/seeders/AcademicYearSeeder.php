<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($school_id)
    {
        AcademicYear::factory(rand(5, 7))->create([
            'school_id' => $school_id
        ]);
    }
}
