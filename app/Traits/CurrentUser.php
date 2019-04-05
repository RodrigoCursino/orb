<?php

namespace App\Traits;

use App\Models\User;

trait CurrentUser {
    public static function get () {
       return User::findOrFail(auth()->id());
    }
}