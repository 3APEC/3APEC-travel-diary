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
                'shortDescription' => ['required','string'],
            ]));

            return view('entries', [
                'destination' => $destination,
                'entries' => $destination->entries
            ]);   
        } else {
            return PermissionClass::returnPermissionError('home');
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
            return PermissionClass::returnPermissionError('home');
        }
       
    }

    public function create()
    {
        if(!PermissionClass::checkPermission(1)){
            return PermissionClass::returnPermissionError('destinations.index');
        }
        return view('destinationform');
    }
}
