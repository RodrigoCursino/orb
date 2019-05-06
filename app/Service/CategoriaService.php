<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 08/04/2019
 * Time: 17:41
 */

namespace App\Service;


use App\Http\Requests\LinhaCreateRequest;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaService
{
    public function create(LinhaCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $categoria = new Categoria();

            $categoria->nome       = $request->input('nome');
            $categoria->save();

            return $categoria;

        });
    }

    public function update(LinhaCreateRequest $request, $id)
    {

        return DB::transaction(function () use ($request, $id) {

            $categoria = Categoria::findOrFail($id);

            $categoria->nome       = $request->input('nome');
            $categoria->save();

            return $categoria;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $categoria = Categoria::findOrFail($id);
            $categoria->ativo = 0;
            $categoria->save();
            return true;

        });
    }
}