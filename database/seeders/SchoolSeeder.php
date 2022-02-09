<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Clases;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Config;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::factory(rand(5, 7))->create()->each(function ($school) {
            // AcademicYear
            $this->call(AcademicYearSeeder::class, false, ['school_id' => $school->id]);

            // Admin
            $this->call(UserSeeder::class, false, ['school_id' => $school->id]);

            // Teacher
            $this->call(TeacherSeeder::class, false, ['school_id' => $school->id]);

            // Class
            $this->call(ClasesSeeder::class, false, ['school_id' => $school->id]);

            // Student
            $this->call(StudentSeeder::class, false, ['school_id' => $school->id]);

            // ExaminationGroup
            $this->call(ExaminationGroupSeeder::class, false, ['school_id' => $school->id]);
        });
    }
}
