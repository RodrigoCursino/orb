<?php

namespace App\Service;

use App\Http\Requests\BancosCreateRequest;
use App\Models\Banco;
use Illuminate\Support\Facades\DB;

class BancosService
{
    public function create(BancosCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $banco = new Banco();

            $banco->nome = $request->input('nome');
            $banco->cod  = $request->input('cod');
            $banco->save();

            return $banco;

        });
    }

    public function update(BancosCreateRequest $request, $id)
    {

        return DB::transaction(function () use ($request, $id) {

            $banco = Banco::findOrFail($id);

            $banco->nome = $request->input('nome');
            $banco->cod  = $request->input('cod');
            $banco->save();

            return $banco;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $banco = Banco::findOrFail($id);
            $banco->ativo = 0;
            $banco->save();
            return true;

        });
    }
}