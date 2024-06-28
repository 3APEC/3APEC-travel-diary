<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Entry $entry) {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);
    
        $entry->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);
    
        return back();
    }
}
