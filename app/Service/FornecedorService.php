<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 29/03/2019
 * Time: 14:26
 */

namespace App\Service;
use App\Models\Contato;
use App\Models\DadosBancarios;
use App\Models\Endereco;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;


use App\Http\Requests\FornecedorCreateRequest;

class FornecedorService
{
    public function create(FornecedorCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $dados_bancario = new DadosBancarios();
            $dados_bancario->conta         = $request->input('conta');
            $dados_bancario->agencia       = $request->input('agencia');
            $dados_bancario->banco_id      = $request->input('banco_id');
            $dados_bancario->save();

            $endereco = new Endereco();

            $endereco->cep             = $request->input('cep');
            $endereco->logradouro      = $request->input('logradouro');
            $endereco->numero          = $request->input('numero');
            $endereco->bairro          = $request->input('bairro');
            $endereco->cidade          = $request->input('cidade');
            $endereco->estado          = $request->input('estado');
            $endereco->pais            = $request->input('pais');

            $endereco->save();

            $contato = new Contato();

            $contato->email           = $request->input('email');
            $contato->telefone        = $request->input('telefone');
            $contato->celular         = $request->input('celular');
            $contato->nome            = $request->input('nome');

            $contato->save();


            $fornecedor = new Fornecedor();

            $fornecedor->cnpj                = $request->input('cnpj');
            $fornecedor->ie                  = $request->input('ie');
            $fornecedor->nome_fantasia       = $request->input('nome_fantasia');
            $fornecedor->razao_social        = $request->input('razao_social');
            $fornecedor->observacao          = $request->input('observacao');
            $fornecedor->forn_mercadoria     = $request->input('forn_mercadoria');
            $fornecedor->endereco_id         = $endereco->id;
            $fornecedor->contato_id          = $contato->id;
            $fornecedor->dados_bancarios_id  = $dados_bancario->id;

            $fornecedor->save();

            return $fornecedor;
        });
    }


    public function update(FornecedorCreateRequest $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            //Fornecedor
            $fornecedor = Fornecedor::findOrFail($id);

            $fornecedor->cnpj             = $request->input('cnpj');
            $fornecedor->ie               = $request->input('ie');
            $fornecedor->nome_fantasia    = $request->input('nome_fantasia');
            $fornecedor->razao_social     = $request->input('razao_social');
            $fornecedor->observacao       = $request->input('observacao');
            $fornecedor->forn_mercadoria  = $request->input('forn_mercadoria');
            $fornecedor->save();


            //Endereco
            $endereco = Endereco::findOrFail($fornecedor->endereco_id);

            $endereco->cep             = $request->input('cep');
            $endereco->logradouro      = $request->input('logradouro');
            $endereco->numero          = $request->input('numero');
            $endereco->bairro          = $request->input('bairro');
            $endereco->cidade          = $request->input('cidade');
            $endereco->estado          = $request->input('estado');
            $endereco->pais            = $request->input('pais');
            $endereco->save();

            //Contato
            $contato =  Contato::findOrFail($fornecedor->contato_id);

            $contato->email           = $request->input('email');
            $contato->telefone        = $request->input('telefone');
            $contato->celular         = $request->input('celular');
            $contato->nome            = $request->input('nome');
            $contato->save();

            return $fornecedor;

        });

    }

    public function destroy($id)
    {
      return DB::transaction(function () use ($id) {
       $fornecedor = Fornecedor::findOrFail($id);

       // Contato
       $contato    = Contato::findOrFail($fornecedor->contato_id);
       $contato->delete();

       // Endereco
       $endereco   = Endereco::findOrFail($fornecedor->endereco_id);
       $endereco->delete();

       // Dados Bancários
       $dadosBancarios   = DadosBancarios::findOrFail($fornecedor->dados_bancarios_id);
       $dadosBancarios->delete();

       $fornecedor->delete();

       return true;

      });
    }
}