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

    public function store(Destination $destination, Request $request)
    {
        $entry = Entry::create([
            ...$request->validate([
                'caption' => 'required',
                'text' => 'required',
            ]),
            'destination_id' => $destination->id,
            'user_id' => $request->user()->id,
        ]);

        return view('entry', [
            'entry' => $entry,
        ]);
    }
}
