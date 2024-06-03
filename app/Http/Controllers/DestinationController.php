<?php

namespace App\Http\Controllers;


use App\Models\Destination;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Ramsey\Uuid\Type\Integer;

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

}
