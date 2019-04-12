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
use App\Traits\DadosComunsCadastro;
use Illuminate\Support\Facades\DB;


use App\Http\Requests\FornecedorCreateRequest;

class FornecedorService
{
    public function create(FornecedorCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $dados_bancario = DadosComunsCadastro::saveDadosBancarios($request);
            $endereco       = DadosComunsCadastro::saveEndereco($request);
            $contato        = DadosComunsCadastro::saveContato($request);

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

            // Endereco
            DadosComunsCadastro::findEndereco($request, $fornecedor->endereco_id);

            //Contato
            DadosComunsCadastro::findContato($request, $fornecedor->contato_id);

            // Dados Bancários
            DadosComunsCadastro::findDadosBancarios($request, $fornecedor->dados_bancarios_id);

            return $fornecedor;

        });

    }

    public function destroy($id)
    {

      return DB::transaction(function () use ($id) {
       $fornecedor = Fornecedor::findOrFail($id);

       // Contato
       DadosComunsCadastro::deleteContato($fornecedor->contato_id);

       // Endereco
       DadosComunsCadastro::deleteEndereco($fornecedor->endereco_id);

       // Dados Bancários
       DadosComunsCadastro::deleteDadosBancarios($fornecedor->dados_bancarios_id);

       $fornecedor->ativo = 0;
       $fornecedor->save();

       return true;

      });
    }
}