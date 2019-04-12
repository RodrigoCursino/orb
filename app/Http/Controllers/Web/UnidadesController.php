<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\UnidadesCreateRequest;
use App\Models\Banco;
use App\Models\CentroCusto;
use App\Models\Unidade;
use App\Service\UnidadesService;
use App\Http\Controllers\Controller;

class UnidadesController extends Controller
{
    private  $service;

    public function __construct(UnidadesService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $unidades = Unidade::with('contato')
            ->with('endereco')
            ->where('ativo','=',1)
            ->paginate(5);

        return view('unidade.index',compact('unidades'));
    }


    public function create()
    {
        $centrosCustos = CentroCusto::list();
        $unidades      = Unidade::list();
        return view('unidade.create',compact('centrosCustos','unidades'));
    }

    public function store(UnidadesCreateRequest $request)
    {
        $unidade = $this->service->create($request);
        return redirect(route('unidades.index'));
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        $unidade = Unidade::with('contato')
            ->with('endereco')
            ->with('centroCusto')
            ->where('id','=',$id)->first();

        $centrosCustos = CentroCusto::list();
        $unidades      = Unidade::list();

        return view('unidade.create',compact('centrosCustos','unidade','unidades'));
    }

    public function update(UnidadesCreateRequest $request, $id)
    {
        $unidade = $this->service->update($request, $id);
        return redirect(route('unidades.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)){
            return redirect(route('unidades.index'));
        }
    }
}
