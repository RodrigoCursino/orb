<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 08/04/2019
 * Time: 17:41
 */

namespace App\Service;

use App\Http\Requests\NCMsCreateRequest;
use App\Models\NCM;
use Illuminate\Support\Facades\DB;

class NCMsService
{
    public function create(NCMsCreateRequest $request)
    {

        return DB::transaction(function () use ($request) {

            $ncm = new NCM();

            $ncm->cod            = $request->input('cod');
            $ncm->descricao      = $request->input('descricao');

            $ncm->save();

            return $ncm;

        });
    }

    public function update(NCMsCreateRequest $request, $id)
    {

        return DB::transaction(function () use ($request, $id) {

            $ncm = NCM::findOrFail($id);

            $ncm->cod            = $request->input('cod');
            $ncm->descricao      = $request->input('descricao');

            $ncm->save();

            return $ncm;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $ncm = NCM::findOrFail($id);
            $ncm->ativo = 0;
            $ncm->save();

            return true;

        });
    }
}