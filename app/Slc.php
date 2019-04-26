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
            'menu'         => [
                [
                    "icon"       => 'keyboard_arrow_up',
                    "icon-alt"   => 'keyboard_arrow_down',
                    "text"       => 'Cadatroe',
                    "text"       => 'Cadastros',
                    "model"      => false,
                    "children"   => [
                        [
                             "position" => 1,
                             "text"     => "Fornecedores",
                             "link"     => "#fornecedores",
                             "action"   => "fornecedores",
                             "icon"     => "contacts",
                             "showNav"  => false,
                             "showPage" => false
                        ],
                        [
                            "position" => 2,
                            "text"     => "Mercadoria",
                            "link"     => "#mercadorias",
                            "action"   => "mercadorias",
                            "icon"     => "featured_play_list",
                            "showNav"  => true,
                            "showPage" => true
                        ]
                    ]
                ],
            ]
        ];
    }
    public static function getCurrentUser()
    {
        if (auth()->guest()) return null;
        return auth()->user()->toArray();
    }
}
