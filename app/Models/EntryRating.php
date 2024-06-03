<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EntryRating extends Model
{
    use HasFactory;

    protected $primaryKey = ['entry_id', 'user_id'];
    protected $fillable = ['isDislike', 'isLike', 'user_id', 'entry_id'];

    public function entry(): BelongsTo
    {
        return $this->belongsTo(Entry::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
