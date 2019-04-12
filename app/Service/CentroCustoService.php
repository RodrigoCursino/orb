<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 08/04/2019
 * Time: 17:41
 */

namespace App\Service;

use App\Http\Requests\CargosCreateRequest;
use App\Http\Requests\CentrosCustoCreateRequest;
use App\Models\Cargo;
use App\Models\CentroCusto;
use App\Traits\DadosComunsCadastro;
use Illuminate\Support\Facades\DB;

class CentroCustoService
{
    public function create(CentrosCustoCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $dados_bancarios = DadosComunsCadastro::saveDadosBancarios($request);

            $centroCusto = new CentroCusto();
            $centroCusto->nome               = $request->input('nome_centro_custo');
            $centroCusto->dados_bancarios_id = $dados_bancarios->id;

            $centroCusto->save();

            return $centroCusto;

        });
    }

    public function update(CentrosCustoCreateRequest $request, $id)
    {

        return DB::transaction(function () use ($request, $id) {

            $centroCusto        = CentroCusto::findOrFail($id);
            $centroCusto->nome  = $request->input('nome_centro_custo');
            $centroCusto->save();

            DadosComunsCadastro::findDadosBancarios($request, $centroCusto->dados_bancarios_id);

            return $centroCusto;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $centroCusto = CentroCusto::findOrFail($id);

            DadosComunsCadastro::deleteDadosBancarios($centroCusto->dados_bancarios_id);

            $centroCusto->ativo = 0;
            $centroCusto->save();

            return true;

        });
    }
}