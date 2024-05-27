<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\EntryRating;

class EntryRatingController extends Controller
{
    public function like(Destination $destination, Entry $entry)
    {
        $entryRating = EntryRating::where('entry_id', $entry->id)->where('user_id', 1)->first();

        if ($entryRating !== null) {
            $entryRating->update([
                'isLike' => 1,
                'isDislike' => 0,
            ]);
        } else {
            EntryRating::create([
                'user_id' => 1,
                'entry_id' => $entry->id,
                'isLike' => 1,
                'isDislike' => 0,
            ]);
        }

        return back();
    }

    public function dislike(Destination $destination, Entry $entry)
    {
        $entryRating = EntryRating::where('entry_id', $entry->id)->where('user_id', 1)->first();

        if($entryRating !== null) {
            $entryRating->update([
                'isLike' => 0,
                'isDislike' => 1,
            ]);
        } else {
            EntryRating::create([
                'user_id' => 1,
                'entry_id' => $entry->id,
                'isLike' => 0,
                'isDislike' => 1,
            ]);
        }

        return back();
    }
}
