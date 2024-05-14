<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EntryController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/destinations');

// Destinations
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('destinations.show');

// Destination Entries
Route::get('/destinations/{destination}/entries', [EntryController::class, 'index'])->name('entries.index');
Route::get('/destinations/{destination}/entries/{entry}', [EntryController::class,'show'])->name('entries.show');