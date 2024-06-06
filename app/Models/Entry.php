<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'caption',
        'text',
        'destination_id',
        'user_id',
    ];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(EntryRating::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(EntryRating::class)->where('isLike', true);
    }

    public function dislikes(): HasMany
    {
        return $this->hasMany(EntryRating::class)->where('isDislike', true);
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function isLiked(): bool
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    public function isDisliked(): bool
    {
        return $this->dislikes()->where('user_id', auth()->id())->exists();
    }

    // TODO: Add Function for Comments when implemented

    // public function comments(): HasMany
    // {
    //     return $this->hasMany();
    // }

}
