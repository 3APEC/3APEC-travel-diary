<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entry extends Model
{
    use HasFactory;

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function rating(): HasMany
    {
        return $this->hasMany(EntryRating::class);
    }

    // TODO: Add Function for Comments when implemented

    // public function comments(): HasMany
    // {
    //     return $this->hasMany();
    // }

}
