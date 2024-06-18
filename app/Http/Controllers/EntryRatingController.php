<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Entry;
use Illuminate\Support\Facades\DB;

class EntryRatingController extends Controller
{
    // Hard coded SQL-Syntax because Eloquent does not the job it is suppose to do

    public function like(Destination $destination, Entry $entry)
    {   
        // Check if user has already rated the entry
        $entryRating = DB::select('select * from entry_ratings where entry_id = ? and user_id = ?', [$entry->id, auth()->id()]);
    
        // If user has already rated the entry, update the rating otherwise create a new rating
        if ($entryRating){
            // If user has already liked the entry, remove the like
            if($entryRating[0]->isLike == 1){
                DB::update('update entry_ratings set isLike = 0, isDislike = 0, updated_at = CURRENT_TIMESTAMP() where entry_id = ? and user_id = ?', [$entry->id, auth()->id()]);
            } else {
                DB::update('update entry_ratings set isLike = 1, isDislike = 0, updated_at = CURRENT_TIMESTAMP() where entry_id = ? and user_id = ?', [$entry->id, auth()->id()]);
            }
        } else {
            DB::insert('insert into entry_ratings (user_id, entry_id, isLike, isDislike, created_at, updated_at) values (?, ?, 1, 0, CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())', [auth()->id(), $entry->id,]);
        }

        return back();    
    }

    public function dislike(Destination $destination, Entry $entry)
    {
        // Check if user has already rated the entry
        $entryRating = DB::select('select * from entry_ratings where entry_id = ? and user_id = ?', [$entry->id, auth()->id()]);
    
        // If user has already rated the entry, update the rating otherwise create a new rating
        if ($entryRating){
            // If user has already liked the entry, remove the like
            if($entryRating[0]->isDislike == 1){
                DB::update('update entry_ratings set isLike = 0, isDislike = 0, updated_at = CURRENT_TIMESTAMP() where entry_id = ? and user_id = ?', [$entry->id, auth()->id()]);
            } else {
                DB::update('update entry_ratings set isLike = 0, isDislike = 1, updated_at = CURRENT_TIMESTAMP() where entry_id = ? and user_id = ?', [$entry->id, auth()->id()]);
            }
        } else {
            DB::insert('insert into entry_ratings (user_id, entry_id, isLike, isDislike, created_at, updated_at) values (?, ?, 0, 1, CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())', [auth()->id(), $entry->id,]);
        }

        return back();   
    }
}
