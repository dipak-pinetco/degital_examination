<?php

namespace Database\Seeders;

use App\Models\Clases;
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
    public function run($clases_id)
    {
        $randomSubjectsId = Subject::all()->random(rand(1, 12))->pluck('id');
        Clases::find($clases_id)->subjects()->sync($randomSubjectsId);
    }
}
