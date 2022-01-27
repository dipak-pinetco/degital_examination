<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Clases;
use App\Models\ExaminationGroup;
use App\Models\School;
use App\Models\Subject;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = Config::get('permission.roles');
        foreach ($roles as $key => $role) {
            Role::create(['name' => $role]);
        }
        Subject::factory(rand(10, 15))->create();
        School::factory(5)->create()->each(function ($school) use ($roles) {

            AcademicYear::factory(rand(5,7))->create(['school_id' => $school->id]);
            Clases::factory(10)->create(['school_id' => $school->id]);
            ExaminationGroup::factory(4)->create(['school_id' => $school->id]);


            User::factory(5)->create()->each(function ($user) use ($roles) {
                $user->assignRole($roles[0]);
            });
            User::factory(10)->create()->each(function ($user) use ($roles) {
                $user->assignRole($roles[1]);
            });
            User::factory(100)->create()->each(function ($user) use ($roles) {
                $user->assignRole($roles[2]);
            });
        });
    }
}
