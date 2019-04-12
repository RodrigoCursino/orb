<?php

namespace App\Http\Controllers\Web;

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
        $departamentos =  Departamento::with('unidade')
            ->where('ativo','=',1)
            ->paginate(15);

        return view('departamento.index',compact('departamentos'));
    }


    public function create()
    {
        $unidades = Unidade::list();
        return view('departamento.create',compact('unidades'));
    }

    public function store(DepartamentosCreateRequest $request)
    {
        $departamento = $this->service->create($request);
        return redirect(route('departamentos.index'));
    }


    public function show($id)
    {
        $departamento = Departamento::where('unidade_id','=',$id)
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
        $departamento = $this->service->update($request, $id);
        return redirect(route('departamentos.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return redirect(route('departamentos.index'));
        }
    }
}
