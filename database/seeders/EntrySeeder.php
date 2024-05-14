<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Entry;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinations = Destination::all();
        $users = User::all();
        foreach($destinations as $destination) {
            for($i = 0; $i < 40; $i++) {
                Entry::factory()->create([
                    "destination_id" => $destination->id,
                    "user_id" => $users->random()->id
                ]);
            }
        }

    }
}
