<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubGrupoCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "nome"     => "required",
            "grupo_id" => "required"
        ];
    }
}
