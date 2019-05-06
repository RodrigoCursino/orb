<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RetencaoCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "nome"       => "required",
            "observacao" => "required"
        ];
    }
}
