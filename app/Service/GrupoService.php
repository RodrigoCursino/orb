<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 08/04/2019
 * Time: 15:50
 */

namespace App\Service;


use App\Http\Requests\GrupoCreateRequest;
use App\Models\Grupo;
use App\Models\NCM;
use Illuminate\Support\Facades\DB;

class GrupoService
{
    public function create(GrupoCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {


            $grupo = new Grupo();

            $grupo->nome       = $request->input('nome');
            $grupo->observacao = $request->input('observacao');
            $ncm               = NCM::find($request->input('ncm_id'));
            $grupo->ncm_id     = isset($ncm->id) ? $ncm->id : null;

            $grupo->save();

            return $grupo;

        });
    }

    public function update(GrupoCreateRequest $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            $grupo = Grupo::findOrFail($id);

            $grupo->nome       = $request->input('nome');
            $grupo->observacao = $request->input('observacao');
            $ncm               = NCM::find($request->input('ncm_id'));
            $grupo->ncm_id     = isset($ncm->id) ? $ncm->id : null;

            $grupo->save();

            return $grupo;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $grupo = Grupo::findOrFail($id);
            $grupo->ativo = 0;
            $grupo->save();

            return true;

        });
    }
}