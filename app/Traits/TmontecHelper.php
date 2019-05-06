<?php

namespace App\Traits;

trait TmontecHelper {

    // listagem de ativos
    public static function list()
    {
        return parent::where('ativo','=',1)->get();
    }

    // listagem de não ativos
    public static function listAllDisabled()
    {
        return parent::where('ativo','=',0)->get();
    }
}