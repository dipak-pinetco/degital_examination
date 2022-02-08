<?php

namespace Database\Seeders;

use App\Models\ClassDivision;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClassDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($class_id)
    {
        $classDivisionRenge = collect(range(ClassDivision::CLASS_DIVISIONS_START, ClassDivision::CLASS_DIVISIONS_END));

        $randomDivisionCount = rand(1, count($classDivisionRenge));

        $insertData = [];
        foreach ($classDivisionRenge->take($randomDivisionCount) as  $division) {
            array_push($insertData, [
                'name' => $division,
                'class_id' => $class_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        ClassDivision::insert($insertData);
    }
}
