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
use App\Models\Colecao;
use App\Models\Linha;
use Illuminate\Support\Facades\DB;

class ColecoesService
{
    public function create(LinhaCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $categoria = new Colecao();

            $categoria->nome       = $request->input('nome');
            $categoria->save();

            return $categoria;

        });
    }

    public function update(LinhaCreateRequest $request, $id)
    {

        return DB::transaction(function () use ($request, $id) {

            $colecao = Colecao::findOrFail($id);

            $colecao->nome       = $request->input('nome');
            $colecao->save();

            return $colecao;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $colecao = Colecao::findOrFail($id);
            $colecao->ativo = 0;
            $colecao->save();
            return true;

        });
    }
}