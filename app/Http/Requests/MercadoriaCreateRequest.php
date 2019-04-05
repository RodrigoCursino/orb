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
          "fornecedor_id" => "required",
          "grupo_id" => "required",
          "sub_grupo_id" => "required",
          "nome" => "required",
          "ncm" => "required",
          "unidade_medida" => "required|max:2",
          "unidade_caixa" => "required|max:3",
          "observacao" => "required",
          "valor_custo" => "required",
          "valor_venda" => "required",
          "desconto_venda" => "required",
          "validade_venda" => "required",
          "descricao_preco_venda" => "required",
          "observacao_preco_venda" => "required"
        ];
    }
}
