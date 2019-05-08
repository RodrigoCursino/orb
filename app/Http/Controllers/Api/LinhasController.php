<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LinhaCreateRequest;
use App\Models\Linha;
use App\Service\LinhaService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinhasController extends Controller
{
    private $service;

    public function __construct(LinhaService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Linha::list();
    }

    public function create()
    {
        return view('linha.create');
    }

    public function store(LinhaCreateRequest $request)
    {
        $linha = $this->service->create($request);
        return  [
            "data" => $linha,
            "message"   => "Categoria Salvo Com Sucesso",
        ];
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $linha = Linha::findOrFail($id);
        return view('linha.create',compact('linha'));
    }

    public function update(LinhaCreateRequest $request)
    {
        $linha = $this->service->update($request, $request->input('id'));
        return  [
            "data" => $linha,
            "message"   => "Linha Editada Com Sucesso",
        ];
    }

    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return "Deletado com sucesso!!!";
        }
    }
}
