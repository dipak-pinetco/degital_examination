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
    public function run($clases_id)
    {
        $classDivisionRenge = collect(ClassDivision::class_divisions_array());

        $randomDivisionCount = rand(1, count($classDivisionRenge));

        $insertData = [];
        foreach ($classDivisionRenge->take($randomDivisionCount) as  $division) {
            array_push($insertData, [
                'name' => $division,
                'clases_id' => $clases_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        ClassDivision::insert($insertData);
    }
}
