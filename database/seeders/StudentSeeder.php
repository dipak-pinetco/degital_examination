<?php

namespace Database\Seeders;

use App\Models\Student;
use Config;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($school_id)
    {
        Student::factory(100)->create([
            'school_id' => $school_id
        ])->each(function ($user) {
            $user->assignRole(Config::get('permission.roles')[3]);
        });
    }
}
