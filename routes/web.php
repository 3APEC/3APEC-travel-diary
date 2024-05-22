<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EntryController;
use App\Models\Destination;
use App\Models\Entry;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::redirect('/', '/destinations');

//Route::post('/destinations/{destination}/entries/store', [EntryController::class, 'store'])->name('entries.store');


Route::get('/', function(){
    return view('home');
})->name('home');


Route::middleware('auth')->group(function(){
    Route::get('/destinations/{destination}/entries/create', function(Destination $destination){
        return view ('entryform', [
            'destination' => $destination,
        ]);
    })->name('entries.create');

    Route::get('/destinations/{destination}/entries/{entry}/edit', function(Destination $destination, Entry $entry){
        return view('entryform', [
            'destination' => $destination,
            'entry' => $entry,
        ]);
    })->name('entries.edit');
    Route::post('/destinations/{destination}/entries/store', [EntryController::class, 'store'])->name('entries.store');
});
// Destinations
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('destinations.show');
//Route::get('/destinations/{destination}/entries/create', [EntryController::class, 'create'])->name('entries.create');


// Destination Entries
Route::get('/destinations/{destination}/entries', [EntryController::class, 'index'])->name('entries.index');
Route::get('/destinations/{destination}/entries/{entry}', [EntryController::class,'show'])->name('entries.show');

// Route::middleware('auth')->apiResource('entries', EntryController::class)->only(['create', 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    
});

require __DIR__.'/auth.php';