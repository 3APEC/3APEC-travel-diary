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
            'name' => 'Teekun',
            'email' => 'teekun@teekun.dev',
            'role_id' => 0,
        ]);

        User::factory(10)->create();

        $this->call(DestinationSeeder::class);
        $this->call(EntrySeeder::class);
        $this->call(EntryRatingSeeder::class);

        
    }
}
