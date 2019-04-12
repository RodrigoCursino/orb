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
use App\Models\Categoria;
use App\Models\Departamento;
use App\Models\Fabricante;
use App\Models\Marca;
use App\Models\Unidade;
use Illuminate\Support\Facades\DB;

class DepartamentosService
{
    public function create(DepartamentosCreateRequest $request)
    {

        return DB::transaction(function () use ($request) {

            $departamento = new Departamento();

            $departamento->nome           = $request->input('nome');
            $departamento->descricao      = $request->input('descricao');
            $unidade                      = Unidade::findOrFail($request->input('unidade_id'));
            $departamento->unidade_id     = $unidade->id;

            $departamento->save();

            return $departamento;

        });
    }

    public function update(DepartamentosCreateRequest $request, $id)
    {

        return DB::transaction(function () use ($request, $id) {


            $departamento = Departamento::findOrFail($id);

            $departamento->nome           = $request->input('nome');
            $departamento->descricao      = $request->input('descricao');
            $unidade                      = Unidade::findOrFail($request->input('unidade_id'));
            $departamento->unidade_id     = $unidade->id;

            $departamento->save();


            return $departamento;

        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $departamento = Departamento::findOrFail($id);
            $departamento->ativo = 0;
            $departamento->save();

            return true;

        });
    }
}