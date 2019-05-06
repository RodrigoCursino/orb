<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CentrosCustoCreateRequest extends FormRequest
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
            "nome_centro_custo"  => "required",
            "conta"              => "required",
            "agencia"            => "required",
            "banco_id"           => "required"
        ];
    }
}
