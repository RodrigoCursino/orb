<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 08/04/2019
 * Time: 17:41
 */

namespace App\Service;


use App\Http\Requests\LinhaCreateRequest;
use App\Http\Requests\MarcasCreateRequest;
use App\Models\Categoria;
use App\Models\Fabricante;
use App\Models\Marca;
use Illuminate\Support\Facades\DB;

class MarcasService
{
    public function create(MarcasCreateRequest $request)
    {

        return DB::transaction(function () use ($request) {

            $marca = new Marca();

            $marca->nome           = $request->input('nome');
            $fabricante            = Fabricante::findOrFail($request->input('fabricante_id'));
            $marca->fabricante_id  = $fabricante->id;

            $marca->save();

            return $marca;

        });
    }

    public function update(MarcasCreateRequest $request, $id)
    {

        return DB::transaction(function () use ($request, $id) {

            $marca = Marca::findOrFail($id);

            $marca->nome           = $request->input('nome');
            $fabricante            = Fabricante::findOrFail($request->input('fabricante_id'));
            $marca->fabricante_id  = $fabricante->id;

            $marca->save();

            return $marca;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $marca = Marca::findOrFail($id);
            $marca->ativo = 0;
            $marca->save();

            return true;

        });
    }
}