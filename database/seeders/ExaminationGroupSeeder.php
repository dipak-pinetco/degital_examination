<?php

namespace Database\Seeders;

use App\Models\ExaminationGroup;
use Illuminate\Database\Seeder;

class ExaminationGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($school_id)
    {
        ExaminationGroup::factory(4)->create([
            'school_id' => $school_id
        ]);
    }
}
