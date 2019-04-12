<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 29/03/2019
 * Time: 14:26
 */

namespace App\Service;

use App\Http\Requests\UnidadesCreateRequest;
use App\Models\CentroCusto;
use App\Models\Unidade;
use App\Traits\DadosComunsCadastro;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;


class UnidadesService
{
    public function create(UnidadesCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $endereco       = DadosComunsCadastro::saveEndereco($request);
            $contato        = DadosComunsCadastro::saveContato($request);

            $unidade = new Unidade();

            $unidade->cnpj                = $request->input('cnpj');
            $unidade->ie                  = $request->input('ie');
            $unidade->nome                = $request->input('nome_unidade');
            $unidade->nome_fantasia       = $request->input('nome_fantasia');
            $unidade->unidade_estoque_id  = $request->input('unidade_estoque_id');
            $unidade->razao_social        = $request->input('razao_social');
            $unidade->loja                = $request->input('loja');
            $unidade->observacao          = $request->input('observacao');
            $unidade->endereco_id         = $endereco->id;
            $unidade->contato_id          = $contato->id;
            $centroCusto                  = CentroCusto::findOrfail($request->input('centro_custo_id'));
            $unidade->centro_custo_id     = $centroCusto->id;

            $unidade->save();

            return $unidade;
        });
    }


    public function update(UnidadesCreateRequest $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            //Fornecedor
            $unidade = Unidade::findOrFail($id);

            $unidade->cnpj                = $request->input('cnpj');
            $unidade->ie                  = $request->input('ie');
            $unidade->nome                = $request->input('nome_unidade');
            $unidade->unidade_estoque_id   = $request->input('unidade_estoque_id');
            $unidade->loja                = $request->input('loja');
            $unidade->nome_fantasia       = $request->input('nome_fantasia');
            $unidade->razao_social        = $request->input('razao_social');
            $unidade->observacao          = $request->input('observacao');
            $unidade->save();

            // Endereco
            DadosComunsCadastro::findEndereco($request, $unidade->endereco_id);

            //Contato
            DadosComunsCadastro::findContato($request, $unidade->contato_id);


            return $unidade;

        });

    }

    public function destroy($id)
    {

      return DB::transaction(function () use ($id) {
       $unidade = Unidade::findOrFail($id);

       // Contato
       DadosComunsCadastro::deleteContato($unidade->contato_id);

       // Endereco
       DadosComunsCadastro::deleteEndereco($unidade->endereco_id);

       $unidade->ativo = 0;
       $unidade->save();

       return true;

      });
    }
}