<?php

namespace App\Http\Controllers\Api;

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
            ->with('centroCusto')
            ->where('ativo','=',1)->get();

        return $unidades;
    }

    public function estoque()
    {
        $unidades = Unidade::where('loja','=',0)
            ->where('ativo','=',1)->get();

        return $unidades;
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
        return [
            "data" => $unidade,
            "message" => "Unidade Salva Com Sucesso!!",
        ];
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
        $unidade = $this->service->update($request, $request->input('id'));
        return [
            "data" => $unidade,
            "message" => "Unidade Salva Com Sucesso!!",
        ];
    }

    public function destroy($id)
    {
        if($this->service->destroy($id)){
            return "Deletado com Sucesso!!!";
        }
    }
}
