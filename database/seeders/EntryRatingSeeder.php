<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entry;
use App\Models\User;

class EntryRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entries = Entry::all();
        $users = User::all();

        foreach($users as $user){
            foreach ($entries as $entry){
                $like = rand(0, 1);

                $entry->ratings()->create([
                    'user_id' => $user->id,
                    'isDislike' => $like == 1 ? 0 : 1,
                    'isLike' => $like == 1 ? 1 : 0,
                ]);
            }
        }
        
    }
}
