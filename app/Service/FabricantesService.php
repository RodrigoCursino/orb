<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 29/03/2019
 * Time: 14:26
 */

namespace App\Service;
use App\Http\Requests\FabricantesCreateRequest;
use App\Models\Contato;
use App\Models\DadosBancarios;
use App\Models\Endereco;
use App\Models\Fabricante;
use App\Models\Fornecedor;
use App\Traits\DadosComunsCadastro;
use Illuminate\Support\Facades\DB;


use App\Http\Requests\FornecedorCreateRequest;

class FabricantesService
{
    public function create(FabricantesCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $endereco       = DadosComunsCadastro::saveEndereco($request);
            $contato        = DadosComunsCadastro::saveContato($request);

            $fabricante = new Fabricante();

            $fabricante->cnpj                = $request->input('cnpj');
            $fabricante->ie                  = $request->input('ie');
            $fabricante->nome                = $request->input('nome_fabricante');
            $fabricante->nome_fantasia       = $request->input('nome_fantasia');
            $fabricante->razao_social        = $request->input('razao_social');
            $fabricante->observacao          = $request->input('observacao');
            $fabricante->natureza_juridica   = $request->input('natureza_juridica');
            $fabricante->endereco_id         = $endereco->id;
            $fabricante->contato_id          = $contato->id;

            $fabricante->save();

            return $fabricante;
        });
    }


    public function update(FabricantesCreateRequest $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            //Fornecedor
            $fabricante = Fabricante::findOrFail($id);

            $fabricante->cnpj                = $request->input('cnpj');
            $fabricante->ie                  = $request->input('ie');
            $fabricante->nome                = $request->input('nome_fabricante');
            $fabricante->nome_fantasia       = $request->input('nome_fantasia');
            $fabricante->razao_social        = $request->input('razao_social');
            $fabricante->observacao          = $request->input('observacao');
            $fabricante->natureza_juridica   = $request->input('natureza_juridica');
            $fabricante->save();

            // Endereco
            DadosComunsCadastro::findEndereco($request, $fabricante->endereco_id);

            //Contato
            DadosComunsCadastro::findContato($request, $fabricante->contato_id);


            return $fabricante;

        });

    }

    public function destroy($id)
    {

      return DB::transaction(function () use ($id) {
       $fabricante = Fabricante::findOrFail($id);

       // Contato
       DadosComunsCadastro::deleteContato($fabricante->contato_id);

       // Endereco
       DadosComunsCadastro::deleteEndereco($fabricante->endereco_id);

       $fabricante->ativo = 0;
       $fabricante->save();

       return true;

      });
    }
}