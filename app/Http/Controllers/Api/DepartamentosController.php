<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DepartamentosCreateRequest;
use App\Models\Departamento;
use App\Models\Unidade;
use App\Service\DepartamentosService;
use App\Http\Controllers\Controller;

class DepartamentosController extends Controller
{
    private $service;

    public function __construct(DepartamentosService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Departamento::with('unidade')
            ->where('ativo','=',1)->get();
    }

    public function create()
    {
        $unidades = Unidade::list();
        return view('departamento.create',compact('unidades'));
    }

    public function store(DepartamentosCreateRequest $request)
    {
        $departamento = $this->service->create($request);
        return  [
            "data" => $departamento,
            "message"   => "Departamento Salvo Com Sucesso",
        ];
    }

    public function show($id)
    {
        $departamento = Departamento::where('unidade_id','=',$id)
                                    ->where('ativo','=',1)
                                    ->get();

        return $departamento->toArray();
    }

    public function edit($id)
    {
        $departamento  = Departamento::with('unidade')
                             ->where('id','=',$id)->first();
        $unidades = Unidade::list();
        return view('departamento.create',compact('departamento','unidades'));
    }

    public function update(DepartamentosCreateRequest $request, $id)
    {
        $departamento = $this->service->update($request, $request->input('id'));
        return  [
            "data" => $departamento,
            "message"   => "Departamento Editada Com Sucesso",
        ];
    }

    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return "Deletado com sucesso!!!";
        }
    }
}
