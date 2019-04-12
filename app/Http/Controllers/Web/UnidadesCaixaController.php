<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\UnidadesCaixaCreateRequest;
use App\Models\UnidadeCaixa;
use App\Http\Controllers\Controller;
use App\Service\UnidadesCaixaService;

class UnidadesCaixaController extends Controller
{

    private $service;

    public function __construct(UnidadesCaixaService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $unidadesCaixa =  UnidadeCaixa::where('ativo','=',1)
            ->paginate(15);

        return view('unidade-caixa.index',compact('unidadesCaixa'));
    }


    public function create()
    {
        return view('unidade-caixa.create');
    }

    public function store(UnidadesCaixaCreateRequest $request)
    {
        $unidadeCaixa = $this->service->create($request);
        return redirect(route('unidadescaixa.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $unidadeCaixa = UnidadeCaixa::findOrFail($id);
        return view('unidade-caixa.create',compact('unidadeCaixa'));
    }


    public function update(UnidadesCaixaCreateRequest $request, $id)
    {
        $unidadeCaixa = $this->service->update($request, $id);
        return redirect(route('unidadescaixa.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return redirect(route('unidadescaixa.index'));
        }
    }
}
