<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 08/04/2019
 * Time: 17:41
 */

namespace App\Service;


use App\Http\Requests\ContaContabeisCreateRequest;
use App\Models\ContaContabil;
use Illuminate\Support\Facades\DB;

class ContaContabilService
{
    public function create(ContaContabeisCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $contaContabil = new ContaContabil();

            $contaContabil->nome               = $request->input('nome');
            $contaContabil->cod_contabilidade  = $request->input('cod_contabilidade');
            $contaContabil->save();

            return $contaContabil;

        });
    }

    public function update(ContaContabeisCreateRequest $request, $id)
    {

        return DB::transaction(function () use ($request, $id) {

            $contaContabil = ContaContabil::findOrFail($id);

            $contaContabil->nome               = $request->input('nome');
            $contaContabil->cod_contabilidade  = $request->input('cod_contabilidade');
            $contaContabil->save();

            return $contaContabil;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $contaContabil = ContaContabil::findOrFail($id);
            $contaContabil->ativo = 0;
            $contaContabil->save();
            return true;

        });
    }
}