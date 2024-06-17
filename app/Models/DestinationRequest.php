<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationRequest extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'shortDescription', 'user_id', 'implemented', 'invalid'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
