<?php

namespace App\Http\Controllers;

use App\Http\Class\PermissionClass;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Models\DestinationRequest;

class DestinationRequestController extends Controller
{
    public function index()
    {
        if (!PermissionClass::checkPermission(1)) {
            return PermissionClass::returnPermissionError('home');
        }

        $destinationRequest = DestinationRequest::all();

        if(1){
            $destinationRequest = $destinationRequest->where('implemented', 0)->where('invalid', 0);
        }


        return view('destinationRequests', [
            'destinationRequests' => $destinationRequest
        ]);
    }

    public function show(DestinationRequest $destinationRequest)
    {
        if(!PermissionClass::checkPermission(1)){
            return PermissionClass::returnPermissionError('home');
        }

        return view('destinationRequest', [
            'destinationRequest' => $destinationRequest
        ]);
    }

    public function create()
    {
        return view('destinationRequest_form');
    }

    public function store(Request $request)
    {
        DestinationRequest::create([
            ...$request->validate([
                'title' => ['max:200', 'required'],
                'shortDescription' => ['max:400', 'required'],
            ]),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('destinations.index')->with('message', 'Request created successfully');
    }

    public function approve(DestinationRequest $destinationRequest)
    {
        if(!PermissionClass::checkPermission(1)){
            return PermissionClass::returnPermissionError('destinations.index');
        }
        $destinationRequest->update([
            'implemented' => 1
        ]);

        if(!Destination::where('name', $destinationRequest->title)->exists())
        {
            Destination::create([
                'name' => $destinationRequest->title,
                'shortDescription' => $destinationRequest->shortDescription
            ]);
        }
        return redirect('destinationRequests.index')->with('message', 'Request imported');
    }

    public function reject(DestinationRequest $destinationRequest)
    {
        if(!PermissionClass::checkPermission(1)){
            return PermissionClass::returnPermissionError('destinations.index');
        }

        $destinationRequest->update([
            'invalid' => 1
        ]);

        return back()->with('message', 'Request rejected');
    }
}
