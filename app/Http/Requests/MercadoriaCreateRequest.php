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
            "fornecedor_id"           =>  "required|numeric",
            "grupo_id"                =>  "required|numeric",
            "sub_grupo_id"            =>  "required",
            "nome"                    =>  "required",
            "ncm_id"                  =>  "required|numeric",
            "categoria_id"            =>  "required|numeric",
            "colecao_id"              =>  "required|numeric",
            "linha_id"                =>  "required|numeric",
            "marca_id"                =>  "required|numeric",
            "unidade_medida_id"       =>  "required|numeric",
            "unidade_caixa_id"        =>  "required|numeric",
            "observacao"              =>  "required",
            "valor_custo"             =>  "required",
            "valor_venda"             =>  "required",
            "desconto_venda"          =>  "required",
            "validade_venda"          =>  "required",
            "descricao_preco_venda"   =>  "required",
            "observacao_preco_venda"  =>  "required"
        ];
    }

    public function messages()
    {
        return [
          "ncm_id.numeric"            => "Por favor selecione uma das opções.",
          "linha_id.numeric"          => "Por favor selecione uma das opções.",
          "categoria_id.numeric"      => "Por favor selecione uma das opções.",
          "colecao_id.numeric"        => "Por favor selecione uma das opções.",
          "marca_id.numeric"          => "Por favor selecione uma das opções.",
          "unidade_medida_id.numeric" => "Por favor selecione uma das opções.",
          "unidade_caixa_id.numeric"  => "Por favor selecione uma das opções.",
          "fornecedor_id.numeric"     => "Por favor selecione uma das opções.",
          "grupo_id.numeric"          => "Por favor selecione uma das opções.",
          "sub_grupo_id.required"     => "O campo Sub Grupo é obrigatório."
        ];
    }
}
