<?php
namespace App;
class Slc
{

    public static function scriptVariables()
    {
        $user = self::getCurrentUser();
        return [
            'user'         => $user,
            'csrfToken'    => csrf_token(),
            'pusher'       => env('PUSHER_APP_KEY'),
        ];
    }
    public static function getCurrentUser()
    {
        if (auth()->guest()) return null;
        return auth()->user()->toArray();
    }
}
