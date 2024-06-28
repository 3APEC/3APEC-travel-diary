<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\DestinationRequestController;
use App\Http\Controllers\EntryController;
use App\Models\Destination;
use App\Models\Entry;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryRatingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchboxController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/profileform', [ProfileController::class, 'show'])->name('profileform.show');

Route::get('/signup', function(){
    return view('users/signup');
})->name('signup');

Route::get('/', function(){
    return view('home');
})->name('home');

//Route::post('/entries/{entry}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show']);

// Only for authenticated users
Route::middleware('auth')->group(function(){

    # Destination Request routes
    Route::get('/destinations/request', [DestinationRequestController::class, 'create'])->name('destinationRequests.create');
    Route::post('/destinations/request/store', [DestinationRequestController::class, 'store'])->name('destinationRequests.store');

    Route::get('/admin/destinations/create', function(){
        return view('destinationform');
    })->name('destinations.create');
    Route::post('/destinations/store', [DestinationController::class, 'store'])->name('destinations.store');

    # Entry routes
    Route::put('/destinations/{destination}/entries/{entry}/like', [EntryRatingController::class, 'like'])->name('entries.like');
    Route::put('/destinations/{destination}/entries/{entry}/dislike', [EntryRatingController::class, 'dislike'])->name('entries.dislike');
    Route::get('/destinations/{destination}/entries/create', [EntryController::class, 'create'])->name('entries.create');
    Route::get('/destinations/{destination}/entries/{entry}/edit', [EntryController::class, 'edit'])->name('entries.edit');
    Route::put('/destinations/{destination}/entries/{entry}/update', [EntryController::class, 'update'])->name('entries.update');
    Route::post('/destinations/{destination}/entries/store', [EntryController::class, 'store'])->name('entries.store');

    # Admin routes
    Route::redirect('/admin', '/admin/users') ->name('admin.index');

    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/admin/request', [DestinationRequestController::class, 'index'])->name('destinationRequests.index');
    Route::get('/admin/request/{destinationRequest}', [DestinationRequestController::class, 'show'])->name('destinationRequests.show');
    Route::put('/admin/request/{destinationRequest}/approve', [DestinationRequestController::class, 'approve'])->name('destinationRequests.approve');
    Route::put('/admin/request/{destinationRequest}/reject', [DestinationRequestController::class, 'reject'])->name('destinationRequests.reject');
});
// Destinations
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('destinations.show');
//Route::get('/destinations/{destination}/entries/create', [EntryController::class, 'create'])->name('entries.create');

Route::post('/search', [SearchboxController::class, 'search'])->name('search');
Route::get('/profile/{user}', function(User $user){
    return view('userProfile',[
        'user' => $user
    ]);

})->name('profile.show');


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