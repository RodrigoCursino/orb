<?php
/**
 * Created by PhpStorm.
 * User: Tmontec
 * Date: 02/09/2018
 * Time: 19:59
 */

namespace App\Traits;


use App\Models\Paciente;

trait GerarMatriculaPaciente
{
    public static function gerarMatricula ()
    {
        $matricula = (string) rand(2,1000000000);
        $matricula = str_pad($matricula,11,'0',STR_PAD_LEFT);
        $matricula = Mascara::mask('###.###.###-##',$matricula);
        $paciente  = Paciente::where('matricula','LIKE',$matricula)->get();
        if(count($paciente->toArray()) > 0) {
            return self::gerarMatricula();
        } else {
            return $matricula;
        }
    }
}