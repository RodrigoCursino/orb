<?php

namespace App;

class Slc
{
    public static function scriptVariables()
    {
        $url = "";

        if(env('APP_ENV') == 'local') {
            $url = "http://" . $_SERVER['SERVER_NAME']. ':8000';
        } else {
            $url = "http://" . $_SERVER['SERVER_NAME'];
        }

        $user = self::getCurrentUser();

        return [
            'base_url'     => $url,
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
                            "text"     => "Fabricantes",
                            "link"     => "#fabricantes",
                            "action"   => "fabricantes",
                            "icon"     => "how_to_reg",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 3,
                            "text"     => "Mercadoria",
                            "link"     => "#mercadorias",
                            "action"   => "mercadorias",
                            "icon"     => "shopping_cart",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 12,
                            "text"     => "Linhas",
                            "link"     => "#linhas",
                            "action"   => "linhas",
                            "icon"     => "list",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 13,
                            "text"     => "Grupos",
                            "link"     => "#grupos",
                            "action"   => "grupos",
                            "icon"     => "loyalty",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 14,
                            "text"     => "Categorias",
                            "link"     => "#categorias",
                            "action"   => "categorias",
                            "icon"     => "done_all",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 15,
                            "text"     => "Coleções",
                            "link"     => "#colecoes",
                            "action"   => "colecoes",
                            "icon"     => "view_module",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 16,
                            "text"     => "NCMs",
                            "link"     => "#ncms",
                            "action"   => "ncms",
                            "icon"     => "filter_none",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 4,
                            "text"     => "Unidade Varejo",
                            "link"     => "#unidadesvarejo",
                            "action"   => "unidadesvarejo",
                            "icon"     => "speaker",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 5,
                            "text"     => "Unidade Atacado",
                            "link"     => "#unidadesatacado",
                            "action"   => "unidadesatacado",
                            "icon"     => "speaker_group",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 6,
                            "text"     => "Unidades",
                            "link"     => "#unidades",
                            "action"   => "unidades",
                            "icon"     => "domain",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 7,
                            "text"     => "Departamentos",
                            "link"     => "#departamentos",
                            "action"   => "departamentos",
                            "icon"     => "dashboard",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 8,
                            "text"     => "Centro de Custo",
                            "link"     => "#centroscusto",
                            "action"   => "centroscusto",
                            "icon"     => "attach_money",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 9,
                            "text"     => "Funcionário",
                            "link"     => "#funcionarios",
                            "action"   => "funcionarios",
                            "icon"     => "face",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 9,
                            "text"     => "Cargo",
                            "link"     => "#cargos",
                            "action"   => "cargos",
                            "icon"     => "event_seat",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 11,
                            "text"     => "Centro de Custo",
                            "link"     => "#centroscusto",
                            "action"   => "centroscusto",
                            "icon"     => "attach_money",
                            "showNav"  => true,
                            "showPage" => true
                        ],
                        [
                            "position" => 11,
                            "text"     => "Banco",
                            "link"     => "#bancos",
                            "action"   => "bancos",
                            "icon"     => "account_balance",
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
