<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 08/04/2019
 * Time: 17:41
 */

namespace App\Service;


use App\Http\Requests\DepartamentosCreateRequest;
use App\Http\Requests\LinhaCreateRequest;
use App\Http\Requests\MarcasCreateRequest;
use App\Http\Requests\SubGrupoCreateRequest;
use App\Models\Categoria;
use App\Models\Departamento;
use App\Models\Fabricante;
use App\Models\Grupo;
use App\Models\Marca;
use App\Models\SubGrupo;
use App\Models\Unidade;
use Illuminate\Support\Facades\DB;

class SubGruposService
{
    public function create(SubGrupoCreateRequest $request)
    {

        return DB::transaction(function () use ($request) {

            $subGrupo = new SubGrupo();

            $subGrupo->nome         = $request->input('nome');
            $grupo                      = Grupo::findOrFail($request->input('grupo_id'));
            $subGrupo->grupo_id     = $grupo->id;

            $subGrupo->save();

            return $subGrupo;

        });
    }

    public function update(SubGrupoCreateRequest $request, $id)
    {

        return DB::transaction(function () use ($request, $id) {


            $subGrupo = SubGrupo::findOrFail($id);

            $subGrupo->nome           = $request->input('nome');
            $grupo                        = Grupo::findOrFail($request->input('grupo_id'));
            $subGrupo->grupo_id       = $grupo->id;

            $subGrupo->save();


            return $subGrupo;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $subGrupo = SubGrupo::findOrFail($id);
            $subGrupo->ativo = 0;
            $subGrupo->save();

            return true;

        });
    }
}