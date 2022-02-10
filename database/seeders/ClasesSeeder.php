<?php

namespace Database\Seeders;

use App\Models\Clases;
use Illuminate\Database\Seeder;

class ClasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($school_id)
    {
        Clases::factory(rand(5, 10))->create([
            'school_id' => $school_id
        ])->each(function ($class) use ($school_id) {
            // Class Division
            $this->callWith(ClassDivisionSeeder::class,  [
                'clases_id' => $class->id,
            ]);

            // Class Subject
            $this->callWith(ClassSubjectSeeder::class,  [
                'clases_id' => $class->id,
            ]);

            // Examination
            $this->callWith(ExaminationSeeder::class,  [
                'examinationable_id' => $class->id,
                'examinationable_type' => 'App\Models\Clases',
                'school_id' => $school_id,
            ]);
        });
    }
}
