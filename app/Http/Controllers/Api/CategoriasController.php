<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LinhaCreateRequest;
use App\Models\Categoria;
use App\Service\CategoriaService;
use App\Http\Controllers\Controller;

class CategoriasController extends Controller
{

    private $service;

    public function __construct(CategoriaService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Categoria::list();
    }


    public function create()
    {
        return view('categoria.create');
    }

    public function store(LinhaCreateRequest $request)
    {
        $categoria = $this->service->create($request);
        return  [
            "data" => $categoria,
            "message"   => "Categoria Categoria Com Sucesso",
        ];
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.create',compact('categoria'));
    }


    public function update(LinhaCreateRequest $request, $id)
    {
        $categoria = $this->service->update($request, $id);
        return redirect(route('categorias.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return "Deletado com Sucesso!!!";
        } else {
            return "Error";
        }
    }
}
