<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_name',
        'name',
        'reason',
        'user_id',
    ];

    /**
     * Get the user that owns the destination request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
