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
use App\Models\Cargo;
use App\Models\Retencao;
use Illuminate\Support\Facades\DB;

class RetencoesService
{
    public function create(RetencaoCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $retencao = new Retencao();

            $retencao->nome            = $request->input('nome');
            $retencao->observacao      = $request->input('observacao');

            $retencao->save();

            return $retencao;

        });
    }

    public function update(RetencaoCreateRequest $request, $id)
    {

        return DB::transaction(function () use ($request, $id) {

            $retencao = Retencao::findOrFail($id);

            $retencao->nome            = $request->input('nome');
            $retencao->observacao      = $request->input('observacao');

            $retencao->save();

            return $retencao;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $retencao = Retencao::findOrFail($id);
            $retencao->ativo = 0;
            $retencao->save();

            return true;

        });
    }
}