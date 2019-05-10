<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MercadoriaCreateRequest extends FormRequest
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
            "fornecedor"           =>  "required",
            "grupo"                =>  "required",
            "sub_grupo"            =>  "required",
            "nome"                 =>  "required",
            "ncm"                  =>  "required",
            "categoria"            =>  "required",
            "colecao"              =>  "required",
            "linha"                =>  "required",
            "marca"                =>  "required",
            "unidade_medida"       =>  "required",
            "unidade_varejo"       =>  "required",
            "observacao"           =>  "required"
        ];
    }

}
