<?php

namespace App\Traits;

trait TmontecHelper {

    // listagem de ativos
    public static function list($columns = ['*'])
    {
        return parent::all($columns)->where('ativo','=',1);
    }

    // listagem de não ativos
    public static function listAllDisabled($columns = ['*'])
    {
        return parent::all($columns)->where('ativo','=',0);
    }
}