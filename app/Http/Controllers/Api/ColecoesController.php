<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LinhaCreateRequest;
use App\Models\Colecao;
use App\Service\ColecoesService;
use App\Service\LinhaService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColecoesController extends Controller
{

    private $service;

    public function __construct(ColecoesService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Colecao::list();
    }


    public function create()
    {
        return view('colecao.create');
    }

    public function store(LinhaCreateRequest $request)
    {
        $colecao = $this->service->create($request);
        return  [
            "data" => $colecao,
            "message"   => "Coelção Salvo Com Sucesso",
        ];
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $colecao = Colecao::findOrFail($id);
        return view('colecao.create',compact('colecao'));
    }


    public function update(LinhaCreateRequest $request)
    {
        $colecao = $this->service->update($request, $request->input('id'));
        return  [
            "data" => $colecao,
            "message"   => "Coleção Editada Com Sucesso",
        ];
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return "Deletado com sucesso!!!";
        }
    }
}
