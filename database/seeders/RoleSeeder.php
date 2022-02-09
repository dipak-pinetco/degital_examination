<?php

namespace Database\Seeders;

use Config;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Config::get('permission.roles');
        foreach ($roles as $key => $role) {
            if (in_array($role, ['teacher', 'student'])) {
                Role::create(['guard_name' => $role, 'name' => $role]);
            } else {
                Role::create(['name' => $role]);
            }
        }
    }
}
