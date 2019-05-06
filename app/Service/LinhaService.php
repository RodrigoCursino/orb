<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 08/04/2019
 * Time: 17:41
 */

namespace App\Service;


use App\Http\Requests\LinhaCreateRequest;
use App\Models\Linha;
use Illuminate\Support\Facades\DB;

class LinhaService
{
    public function create(LinhaCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $linha = new Linha();

            $linha->nome       = $request->input('nome');
            $linha->save();

            return $linha;

        });
    }

    public function update(LinhaCreateRequest $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            $linha = Linha::findOrFail($id);

            $linha->nome       = $request->input('nome');
            $linha->save();

            return $linha;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $linha = Linha::findOrFail($id);
            $linha->ativo = 0;
            $linha->save();
            return true;

        });
    }
}