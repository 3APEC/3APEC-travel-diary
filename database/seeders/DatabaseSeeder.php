<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'role_id' => 1
        ]);

        User::factory()->create([
            'name' => 'Test Moderator',
            'email' => 'test2@example.com',
            'role_id' => 2
        ]);

        User::factory(10)->create();

        $this->call(DestinationSeeder::class);
        $this->call(EntrySeeder::class);

        
    }
}
