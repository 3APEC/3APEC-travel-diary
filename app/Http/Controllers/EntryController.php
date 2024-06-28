<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Destination;
use App\Models\User;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
            'destination' => $destination,
        ]);
    }

    public function store(Destination $destination, Request $request)
    {
        $entry = Entry::create([
            ...$request->validate([
                'caption' => ['required','string','max:255'],
                'text' => ['required','string'],
            ]),
            'destination_id' => $destination->id,
            'user_id' => auth()->id(),
        ]);



        return view('entry', [
            'entry' => $entry,
            'destination' => $destination
        ]);
    }
    public function create(Destination $destination): View
    {
        return view('entryform', [
            'destination' => $destination,
        ]);
    }

    public function update(Destination $destination, int $id, Request $request )
    {
        $entry = Entry::findorfail($id);
        $entry->update($request->validate([
            'caption' => ['required','string','max:255'],
            'text' => ['required','string'],
        ]));

        return view('entry', [
            'entry' => $entry,
            'destination' => $destination,
        ]);
    }
}