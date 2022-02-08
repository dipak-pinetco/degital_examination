<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubjectTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($teacher_id)
    {
        $randomSubjectsId = Subject::all()->random(rand(1, 12))->pluck('id');
        Teacher::find($teacher_id)->subjects()->sync($randomSubjectsId);
    }
}
