<?php

namespace App\Http\Class;

use App\Models\Entry;
use Illuminate\Support\Facades\Auth;

class PermissionClass
{
    public static function checkPermission(int $role_id): bool
    {
        if (Auth::check() && Auth::getUser()->role_id <= $role_id) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkPermissionForEntry(int $role_id, Entry $entry): bool
    {
        if (Auth::check() && (Auth::getUser()->role_id <= $role_id || Auth::getUser()->id == $entry->user_id)) {
            return true;
        } else {
            return false;
        }
    }
}