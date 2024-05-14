<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Destination;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function index(Destination $destination)
    {
        return view('entries',[
            'entries' => Entry::where('destination_id', $destination->id)->get(),
            'destination' => $destination,
        ]);
    }

    public function show(Destination $destination, Entry $entry){
        return view('entry', [
            'entry' => Entry::findorfail($entry->id),
        ]);
    }
}
