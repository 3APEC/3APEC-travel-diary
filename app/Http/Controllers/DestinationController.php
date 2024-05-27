<?php

namespace App\Http\Controllers;

use App\Http\Class\PermissionClass;
use App\Models\Destination;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\View\View;


class DestinationController extends Controller
{
    public function index(): View
    {
        return view('destinations', [
            'destinations' => Destination::all()
        ]);
    }

    public function show(Destination $destination){
        return view('destination',[
            'destination' => $destination
        ]);
    }

    public function store(Request $request)
    {   
        if(PermissionClass::checkPermission(1)){
            $destination = Destination::create($request->validate([
                'name' => ['required','string','max:255'],
            ]));

            return view('destination', [
                'destination' => $destination
            ]);   
        }
    }

    public function update(Destination $destination, Request $request)
    {
        if(PermissionClass::checkPermission(1)){
            $destination->update($request->validate([
                'name' => ['required','string','max:255'],
                'description' => ['required','string'],
            ]));

            return view('destination', [
                'destination' => $destination
            ]);
        } else {
            return redirect()->route('home')->with('error', 'You do not have permission to update this page.');
        }
        
    }

}
