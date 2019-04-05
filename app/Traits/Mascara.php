<?php
/**
 * Created by PhpStorm.
 * User: Tmontec
 * Date: 02/09/2018
 * Time: 19:59
 */

namespace App\Traits;


trait Mascara
{

    public static function mask ($mascara, $valor)
    {
        $maskared = '';
        $k        = 0;

        for ($i = 0; $i <=strlen($mascara)-1; $i++) {
            if ($mascara[$i] == '#') {
                if (isset($valor[$k])) {
                    $maskared .= $valor[$k++];
                }
            } else {
                if (isset($mascara[$i])) {
                    $maskared .= $mascara[$i];
                }
            }
        }
        return $maskared;
    }
}