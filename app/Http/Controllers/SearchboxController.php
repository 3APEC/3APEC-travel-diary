<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Destination;
use App\Models\Entry;

use function Laravel\Prompts\search;

class SearchboxController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
            'withoutUsers' => 'sometimes',
            'withoutDestinations' => 'sometimes',
            'withoutEntries' => 'sometimes',
        ]); 
         

        $search = $request->input('search');

        /* Fill the array with false values if empty
        * 0 - withoutUsers
        * 1 - withoutDestinations
        * 2 - withoutEntries
        */
        $without[0] = filter_var($request->input('withoutUsers') ? true : false, FILTER_VALIDATE_BOOLEAN);
        $without[1] = filter_var($request->input('withoutDestinations') ? true : false, FILTER_VALIDATE_BOOLEAN);
        $without[2] = filter_var($request->input('withoutEntries') ? true : false, FILTER_VALIDATE_BOOLEAN);

        if(!$search || ($without[0] === true && $without[1] === true && $without[2] === true)){
            return redirect()->back()->with('error', 'Please enter a search term or select at least one search category');
        }

        // Users
        if(!$without[0]){
            $users = $this->searchByUser($search);
        }

        // Destinations
        if(!$without[1]){
            $destinations = $this->searchByDestination($search);
        }

        // Entries
        if(!$without[2]){
            $entries = $this->searchByEntry($search);
        }

        // Return the search results
        return view('searchResults', [
            'users' => $users ?? null,
            'destinations' => $destinations ?? null,
            'entries' => $entries ?? null,
            'without' => $without
        ]);
    }


    public function searchByUser(string $search)
    {
        return User::where('name', 'like', '%' . $search . '%')->get();
        
    }

    public function searchByDestination(string $search)
    {
        return Destination::where('name', 'like', '%' . $search . '%')->get();
    }

    public function searchByEntry(string $search)
    {
        return Entry::where('caption', 'like', '%' . $search . '%')->get();
    }
}
