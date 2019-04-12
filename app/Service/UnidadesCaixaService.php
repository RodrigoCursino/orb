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
use Illuminate\Support\Facades\DB;

class UnidadesCaixaService
{
    public function create(UnidadesCaixaCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $unidadeCaixa = new UnidadeCaixa();

            $unidadeCaixa->legenda         = $request->input('legenda');
            $unidadeCaixa->descricao       = $request->input('descricao');

            $unidadeCaixa->save();

            return $unidadeCaixa;

        });
    }

    public function update(UnidadesCaixaCreateRequest $request, $id)
    {

        return DB::transaction(function () use ($request, $id) {

            $unidadeCaixa = UnidadeCaixa::findOrFail($id);

            $unidadeCaixa->legenda         = $request->input('legenda');
            $unidadeCaixa->descricao       = $request->input('descricao');

            $unidadeCaixa->save();

            return $unidadeCaixa;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $unidadeCaixa = UnidadeCaixa::findOrFail($id);
            $unidadeCaixa->ativo = 0;
            $unidadeCaixa->save();

            return true;

        });
    }
}