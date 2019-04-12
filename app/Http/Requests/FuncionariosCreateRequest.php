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
            "nome_funcionario"     => "required",
            "data_nascimento"      => "required",
            "cargo_id"             => "required|numeric",
            "salario"              => "required",
            "apelido"              => "required",
            "rg"                   => "required",
            "cpf"                  => "required",
            "sexo"                 => "required",
            "estado_civil"         => "required",
            "login"                => "required",
            "senha"                => "required",
            "observacao"           => "required",
            "unidade_id"           => "required|numeric",
            "departamento_select"  => "required",
            "cep"                  => "required",
            "logradouro"           => "required",
            "numero"               => "required",
            "bairro"               => "required",
            "cidade"               => "required",
            "estado"               => "required",
            "pais"                 => "required",
            "email"                => "required",
            "telefone"             => "required",
            "celular"              => "required",
            "nome"                 => "required",
            "agencia"              => "required",
            "conta"                => "required",
            "tipo"                 => "required",
            "banco_id"             => "required",
        ];
    }

    public function messages()
    {
        return [
            "cargo_id.numeric"   => "Por favor selecione uma opção",
            "unidade_id.numeric" => "Por favor selecione uma opção",
        ];
    }
}
