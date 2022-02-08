<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Clases;
use App\Models\ClassDivision;
use App\Models\ClassSubject;
use App\Models\ExaminationGroup;
use App\Models\School;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Str;

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

        $this->call(SubjectSeeder::class);

        School::factory(5)->create()->each(function ($school) use ($roles) {
            // AcademicYear
            AcademicYear::factory(rand(5, 7))->create([
                'school_id' => $school->id
            ]);

            // Admin
            User::factory(5)->create([
                'school_id' => $school->id
            ])->each(function ($user) use ($roles) {
                $user->assignRole($roles[1]);
            });

            // Teacher
            Teacher::factory(10)->create([
                'school_id' => $school->id
            ])->each(function ($teacher) use ($roles) {
                $teacher->password = Hash::make('password');
                $teacher->email_verified_at = now();
                $teacher->remember_token = Str::random(10);

                $teacherUser = clone $teacher->user();
                $teacherUser->create(Arr::except($teacher->toArray(), ['id', 'degree']))->save();

                $teacher->user->assignRole($roles[2]);

                // Assign Subject
                $this->call(TeacherSubjectSeeder::class, false, [
                    'teacher_id' => $teacher->id,
                ]);
            });

            // Class
            Clases::factory(rand(5, 10))->create([
                'school_id' => $school->id
            ])->each(function ($class) {
                // Class Division
                $this->call(ClassDivisionSeeder::class, false, [
                    'class_id' => $class->id,
                ]);

                // Class Subject
                $this->call(ClassSubjectSeeder::class, false, [
                    'class_id' => $class->id,
                ]);
            });

            // ExaminationGroup
            // ExaminationGroup::factory(4)->create([
            //     'school_id' => $school->id
            // ]);

            // // Student
            // User::factory(100)->create([
            //     'school_id' => $school->id
            // ])->each(function ($user) use ($roles) {
            //     $user->assignRole($roles[3]);
            // });
        });
    }
}
