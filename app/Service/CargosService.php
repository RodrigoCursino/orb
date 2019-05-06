<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 08/04/2019
 * Time: 17:41
 */

namespace App\Service;

use App\Http\Requests\CargosCreateRequest;
use App\Models\Cargo;
use Illuminate\Support\Facades\DB;

class CargosService
{
    public function create(CargosCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $cargo = new Cargo();

            $cargo->nome            = $request->input('nome');
            $cargo->observacao      = $request->input('observacao');

            $cargo->save();

            return $cargo;

        });
    }

    public function update(CargosCreateRequest $request, $id)
    {

        return DB::transaction(function () use ($request, $id) {

            $cargo = Cargo::findOrFail($id);

            $cargo->nome            = $request->input('nome');
            $cargo->observacao      = $request->input('observacao');

            $cargo->save();

            return $cargo;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $cargo = Cargo::findOrFail($id);
            $cargo->ativo = 0;
            $cargo->save();

            return true;

        });
    }
}