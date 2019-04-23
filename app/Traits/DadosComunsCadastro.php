<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 10/04/2019
 * Time: 12:09
 */

namespace App\Traits;


use App\Models\Contato;
use App\Models\DadosBancarios;
use App\Models\Endereco;

trait DadosComunsCadastro
{
    // Salvar
    public static function saveEndereco($request)
    {
        $endereco = new Endereco();

        $endereco->cep             = $request->endereco["cep"];
        $endereco->logradouro      = $request->endereco["logradouro"];
        $endereco->numero          = $request->endereco["numero"];
        $endereco->bairro          = $request->endereco["bairro"];
        $endereco->complemento     = $request->endereco["complemento"] ? $request->input('complemento') : '' ;
        $endereco->cidade          = $request->endereco["cidade"];
        $endereco->estado          = $request->endereco["estado"];
        $endereco->pais            = $request->endereco["pais"];

        $endereco->save();

        return $endereco;
    }

    public static function saveDadosBancarios($request)
    {
        $dados_bancario = new DadosBancarios();

        $dados_bancario->conta         = $request->dados_bancarios['conta'];
        $dados_bancario->agencia       = $request->dados_bancarios['agencia'];
        $dados_bancario->tipo          = $request->dados_bancarios['tipo'];
        $dados_bancario->banco_id      = $request->dados_bancarios['banco_id'];

        $dados_bancario->save();

        return $dados_bancario;
    }

    public static function saveContato($request)
    {
        $contato = new Contato();

        $contato->email           = $request->contato['email'];
        $contato->telefone        = $request->contato['telefone'];
        $contato->celular         = $request->contato['celular'];
        $contato->nome            = $request->contato['nome'];

        $contato->save();

        return $contato;
    }


    // Editar
    public static function findEndereco($request, $id)
    {
        $endereco = Endereco::findOrFail($id);

        $endereco->cep             = $request->endereco["cep"];
        $endereco->logradouro      = $request->endereco["logradouro"];
        $endereco->numero          = $request->endereco["numero"];
        $endereco->bairro          = $request->endereco["bairro"];
        $endereco->complemento     = $request->endereco["complemento"] ? $request->input('complemento') : '' ;
        $endereco->cidade          = $request->endereco["cidade"];
        $endereco->estado          = $request->endereco["estado"];
        $endereco->pais            = $request->endereco["pais"];

        $endereco->save();
    }

    public static function findDadosBancarios($request, $id)
    {
        $dados_bancario = DadosBancarios::findOrFail($id);

        $dados_bancario->conta         = $request->dados_bancarios['conta'];
        $dados_bancario->agencia       = $request->dados_bancarios['agencia'];
        $dados_bancario->tipo          = $request->dados_bancarios['tipo'];
        $dados_bancario->banco_id      = $request->dados_bancarios['banco_id'];

        $dados_bancario->save();
    }

    public static function findContato($request, $id)
    {
        $contato = Contato::findOrFail($id);

        $contato->email           = $request->contato['email'];
        $contato->telefone        = $request->contato['telefone'];
        $contato->celular         = $request->contato['celular'];
        $contato->nome            = $request->contato['nome'];

        $contato->save();
    }


    // Deletar
    public static function deleteEndereco($id)
    {
        $endereco = Endereco::findOrFail($id);
        $endereco->ativo = 0;
        $endereco->save();
    }

    public static function deleteDadosBancarios($id)
    {
        $dados_bancario = DadosBancarios::findOrFail($id);
        $dados_bancario->ativo = 0;
        $dados_bancario->save();
    }

    public static function deleteContato($id)
    {
        $contato = Contato::findOrFail($id);
        $contato->ativo = 0;
        $contato->save();
    }
}