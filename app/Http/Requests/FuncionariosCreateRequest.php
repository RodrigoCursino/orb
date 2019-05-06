<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionariosCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "nome"                 => "required",
            "data_nascimento"      => "required",
            "cargo"                => "required",
            "salario"              => "required",
            "apelido"              => "required",
            "rg"                   => "required",
            "cpf"                  => "required",
            "sexo"                 => "required",
            "estado_civil"         => "required",
            "observacao"           => "required",
            "unidade"              => "required",
            "departamento"         => "required"
        ];
    }

}
