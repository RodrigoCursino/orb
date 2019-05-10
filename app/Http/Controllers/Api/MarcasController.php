<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\MarcasCreateRequest;
use App\Models\Fabricante;
use App\Models\Marca;
use App\Service\MarcasService;
use App\Http\Controllers\Controller;

class MarcasController extends Controller
{
    private $service;

    public function __construct(MarcasService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $marcas = Marca::with('fabricante')->where('ativo','=',1)->get();

        return $marcas;
    }


    public function create()
    {
        $fabricantes = Fabricante::list();
        return view('marca.create',compact('fabricantes'));
    }

    public function store(MarcasCreateRequest $request)
    {
        $marca = $this->service->create($request);
        return  [
            "data" => $marca,
            "message"   => "Categoria Salvo Com Sucesso",
        ];
    }

    public function show($id)
    {
        $marcas = Marca::with('fabricante')
            ->where('ativo','=',1)
            ->where('fabricante_id','=',$id)
            ->get();

        return $marcas;
    }

    public function edit($id)
    {
        $marca       = Marca::with('fabricante')
                             ->where('id','=',$id)->first();
        $fabricantes = Fabricante::list();
        return view('marca.create',compact('marca','fabricantes'));
    }

    public function update(MarcasCreateRequest $request)
    {
        $marca = $this->service->update($request, $request->input('id'));
        return  [
            "data" => $marca,
            "message"   => "Marca Editada Com Sucesso",
        ];
    }

    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return "Deletado com sucesso!!!";
        }
    }
}
