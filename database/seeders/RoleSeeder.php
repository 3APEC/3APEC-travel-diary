<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Owner', 'id' => 0],
            ['name' => 'Admin', 'id' => 1],
            ['name' => 'Moderator', 'id' => 2],
            ['name' => 'User', 'id' => 3],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
