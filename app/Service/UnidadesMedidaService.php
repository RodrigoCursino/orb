<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 08/04/2019
 * Time: 17:41
 */

namespace App\Service;

use App\Http\Requests\CargosCreateRequest;
use App\Http\Requests\RetencaoCreateRequest;
use App\Http\Requests\UnidadesCaixaCreateRequest;
use App\Models\Cargo;
use App\Models\Retencao;
use App\Models\UnidadeCaixa;
use App\Models\UnidadeMedida;
use Illuminate\Support\Facades\DB;

class UnidadesMedidaService
{
    public function create(UnidadesCaixaCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $unidadeMedida = new UnidadeMedida();

            $unidadeMedida->legenda         = $request->input('legenda');
            $unidadeMedida->descricao       = $request->input('descricao');

            $unidadeMedida->save();

            return $unidadeMedida;

        });
    }

    public function update(UnidadesCaixaCreateRequest $request, $id)
    {

        return DB::transaction(function () use ($request, $id) {

            $unidadeMedida = UnidadeMedida::findOrFail($id);

            $unidadeMedida->legenda         = $request->input('legenda');
            $unidadeMedida->descricao       = $request->input('descricao');

            $unidadeMedida->save();

            return $unidadeMedida;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $unidadeMedida = UnidadeMedida::findOrFail($id);
            $unidadeMedida->ativo = 0;
            $unidadeMedida->save();

            return true;

        });
    }
}