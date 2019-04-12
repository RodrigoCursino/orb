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

        $endereco->cep             = $request->input('cep');
        $endereco->logradouro      = $request->input('logradouro');
        $endereco->numero          = $request->input('numero');
        $endereco->bairro          = $request->input('bairro');
        $endereco->complemento     = $request->input('complemento') ? $request->input('complemento') : '' ;
        $endereco->cidade          = $request->input('cidade');
        $endereco->estado          = $request->input('estado');
        $endereco->pais            = $request->input('pais');

        $endereco->save();

        return $endereco;
    }

    public static function saveDadosBancarios($request)
    {
        $dados_bancario = new DadosBancarios();

        $dados_bancario->conta         = $request->input('conta');
        $dados_bancario->agencia       = $request->input('agencia');
        $dados_bancario->tipo          = $request->input('tipo');
        $dados_bancario->banco_id      = $request->input('banco_id');

        $dados_bancario->save();

        return $dados_bancario;
    }

    public static function saveContato($request)
    {
        $contato = new Contato();

        $contato->email           = $request->input('email');
        $contato->telefone        = $request->input('telefone');
        $contato->celular         = $request->input('celular');
        $contato->nome            = $request->input('nome');

        $contato->save();

        return $contato;
    }


    // Editar
    public static function findEndereco($request, $id)
    {
        $endereco = Endereco::findOrFail($id);

        $endereco->cep             = $request->input('cep');
        $endereco->logradouro      = $request->input('logradouro');
        $endereco->numero          = $request->input('numero');
        $endereco->bairro          = $request->input('bairro');
        $endereco->complemento     = $request->input('complemento') ? $request->input('complemento') : '' ;
        $endereco->cidade          = $request->input('cidade');
        $endereco->estado          = $request->input('estado');
        $endereco->pais            = $request->input('pais');

        $endereco->save();
    }

    public static function findDadosBancarios($request, $id)
    {
        $dados_bancario = DadosBancarios::findOrFail($id);

        $dados_bancario->conta         = $request->input('conta');
        $dados_bancario->agencia       = $request->input('agencia');
        $dados_bancario->tipo          = $request->input('tipo');
        $dados_bancario->banco_id      = $request->input('banco_id');

        $dados_bancario->save();
    }

    public static function findContato($request, $id)
    {
        $contato = Contato::findOrFail($id);

        $contato->email           = $request->input('email');
        $contato->telefone        = $request->input('telefone');
        $contato->celular         = $request->input('celular');
        $contato->nome            = $request->input('nome');

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