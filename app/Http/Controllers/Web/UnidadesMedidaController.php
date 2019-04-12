<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\UnidadesCaixaCreateRequest;
use App\Http\Controllers\Controller;
use App\Models\UnidadeMedida;
use App\Service\UnidadesMedidaService;

class UnidadesMedidaController extends Controller
{

    private $service;

    public function __construct(UnidadesMedidaService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $unidadesMedida =  UnidadeMedida::where('ativo','=',1)
            ->paginate(15);

        return view('unidade-medida.index',compact('unidadesMedida'));
    }


    public function create()
    {
        return view('unidade-medida.create');
    }

    public function store(UnidadesCaixaCreateRequest $request)
    {
        $unidadeMedida = $this->service->create($request);
        return redirect(route('unidadesmedida.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $unidadeMedida = UnidadeMedida::findOrFail($id);
        return view('unidade-medida.create',compact('unidadeMedida'));
    }


    public function update(UnidadesCaixaCreateRequest $request, $id)
    {
        $unidadeMedida = $this->service->update($request, $id);
        return redirect(route('unidadesmedida.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return redirect(route('unidadesmedida.index'));
        }
    }
}
