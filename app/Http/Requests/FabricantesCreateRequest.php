<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FabricantesCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "nome"              => "required",
            "natureza_juridica" => "required",
            "nome_fantasia"     => "required",
            "razao_social"      => "required",
            "observacao"        => "required",
        ];
    }
}
