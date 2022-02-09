<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Config;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($school_id)
    {
        Teacher::factory(10)->create([
            'school_id' => $school_id
        ])->each(function ($teacher) {
            $teacher->assignRole(Config::get('permission.roles')[2]);

            // Assign Subject
            $this->call(SubjectTeacherSeeder::class, false, ['teacher_id' => $teacher->id]);
        });
    }
}
