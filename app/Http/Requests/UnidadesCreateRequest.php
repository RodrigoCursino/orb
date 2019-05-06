<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnidadesCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nome"              => "required",
            "cnpj"              => "required",
            "loja"              => "required",
            "ie"                => "required",
            "nome_fantasia"     => "required",
            "razao_social"      => "required",
            "observacao"        => "required"
        ];
    }
}
