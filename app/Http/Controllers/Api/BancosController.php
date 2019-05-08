<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\BancosCreateRequest;
use App\Models\Banco;
use App\Service\BancosService;
use App\Http\Controllers\Controller;

class BancosController extends Controller
{
    private $service;

    public function __construct(BancosService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Banco::list();
    }

    public function create()
    {
        return view('banco.create');
    }

    public function store(BancosCreateRequest $request)
    {
        $banco = $this->service->create($request);
        return  [
            "data" => $banco,
            "message"   => "Banco Salvo Com Sucesso",
        ];
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $banco = Banco::findOrFail($id);
        return view('banco.create',compact('banco'));
    }

    public function update(BancosCreateRequest $request)
    {
        $banco = $this->service->update($request, $request->input('id'));
        return  [
            "data" => $banco,
            "message"   => "Banco Editada Com Sucesso",
        ];
    }

    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return "Deletado com sucesso!!!";
        }
    }
}
