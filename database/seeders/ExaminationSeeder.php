<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Clases;
use App\Models\Examination;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Seeder;
use PhpParser\Builder\Class_;

class ExaminationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($examinationable_id, $examinationable_type, $school_id)
    {
        $latestAcademicYear = AcademicYear::where('school_id', $school_id)->orderByDesc('id')->first();
        Examination::factory(rand(1, 3))
            ->create([
                'academic_year_id' => $latestAcademicYear->id,
                'examinationable_type' => $examinationable_type,
                'examinationable_id' => $examinationable_id,
            ]);
    }
}
