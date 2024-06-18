<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DestinationRequest;
use Illuminate\Support\Facades\Auth;

class DestinationRequestController extends Controller
{
    public function create()
    {
        return view('destinationrequest.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'reason' => 'required|string|max:1000',
        ]);

        DestinationRequest::create([
            'destination_name' => $request->destination_name,
            'name' => $request->name,
            'reason' => $request->reason,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('destinationrequest.create')->with('success', 'Request submitted successfully!');
    }
}
