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
        ])->each(function ($class) {
            // Class Division
            $this->call(ClassDivisionSeeder::class, false, [
                'clases_id' => $class->id,
            ]);

            // Class Subject
            $this->call(ClassSubjectSeeder::class, false, [
                'clases_id' => $class->id,
            ]);
        });
    }
}
