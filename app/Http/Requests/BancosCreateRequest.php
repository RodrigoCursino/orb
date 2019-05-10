<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BancosCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "nome"      => "required",
            "cod"       => "required|numeric"
        ];
    }
}