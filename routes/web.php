<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryRatingController;

Route::get('/profileform', [ProfileController::class, 'show'])->name('profileform.show');

Route::get('/signup', function(){
    return view('users/signup');
})->name('signup');


Route::get('/', function(){
    return view('home');
})->name('home');

// Only for authenticated users
Route::middleware('auth')->group(function(){
    Route::get('/destinations/{destination}/entries/create', [EntryController::class, 'create'])->name('entries.create');

    Route::get('/destinations/{destination}/entries/{entry}/edit', [EntryController::class, 'edit'])->name('entries.edit');

    Route::put('/destinations/{destination}/entries/{entry}/update', [EntryController::class, 'update'])->name('entries.update');
    
    Route::post('/destinations/{destination}/entries/store', [EntryController::class, 'store'])->name('entries.store');

    Route::get('/destinations/create', function(){
        return view('destinationform');
    })->name('destinations.create');

    Route::post('/destinations/store', [DestinationController::class, 'store'])->name('destinations.store');

    Route::get('/admin/users', [UserController::class, 'index']
    )->name('users.index');

    Route::redirect('/admin', '/admin/users') ->name('admin.index');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

    Route::put('/admin/users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');

    Route::put('/destinations/{destination}/entries/{entry}/like', [EntryRatingController::class, 'like'])->name('entries.like');
    Route::put('/destinations/{destination}/entries/{entry}/dislike', [EntryRatingController::class, 'dislike'])->name('entries.dislike');


});

// Destinations
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('destinations.show');


// Destination Entries
Route::get('/destinations/{destination}/entries', [EntryController::class, 'index'])->name('entries.index');
Route::get('/destinations/{destination}/entries/{entry}', [EntryController::class,'show'])->name('entries.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    
});

require __DIR__.'/auth.php';