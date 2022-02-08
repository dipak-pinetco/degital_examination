<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\TeacherSubject;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TeacherSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($teacher_id)
    {
        $randomSubjectsId = Subject::all()->random(rand(1, 12))->pluck('id');

        $insertData = [];
        foreach ($randomSubjectsId as  $subject_id) {
            array_push($insertData, [
                'subject_id' => $subject_id,
                'teacher_id' => $teacher_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        TeacherSubject::insert($insertData);
    }
}
