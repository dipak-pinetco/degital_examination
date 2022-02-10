<?php

namespace Database\Seeders;

use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            'Gujrati', 'Hindi', 'English', 'Math', 'Coumputer', 'PHP', 'Android', 'iOS',
            'Wordpress', 'Flutter', 'Css', 'Html', 'Javascript', 'Jquery', 'C', 'C++'
        ];

        $insertData = [];
        foreach ($subjects as  $subject) {
            array_push($insertData, [
                'name' => $subject,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        Subject::insert($insertData);
    }
}
