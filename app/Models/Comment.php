<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['entry_id', 'user_id', 'comment'];

    public function entry() {
        return $this->belongsTo(Entry::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
