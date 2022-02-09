<?php

namespace Database\Seeders;

use App\Models\User;
use Config;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($school_id)
    {
        User::factory(5)->create([
            'school_id' => $school_id
        ])->each(function ($user) {
            $user->assignRole(Config::get('permission.roles')[1]);
        });
    }
}
