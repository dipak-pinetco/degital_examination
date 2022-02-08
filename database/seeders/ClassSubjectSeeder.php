<?php

namespace Database\Seeders;

use App\Models\ClassSubject;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClassSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($class_id)
    {
        $randomSubjectsId = Subject::all()->random(rand(1, 12))->pluck('id');

        $insertData = [];
        foreach ($randomSubjectsId as  $subject_id) {
            array_push($insertData, [
                'subject_id' => $subject_id,
                'class_id' => $class_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        ClassSubject::insert($insertData);
    }
}
