<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\FabricantesCreateRequest;
use App\Http\Requests\FornecedorCreateRequest;
use App\Models\Banco;
use App\Models\Fabricante;
use App\Models\Fornecedor;
use App\Service\FabricantesService;
use App\Service\FornecedorService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FabricantesController extends Controller
{
    private  $service;

    public function __construct(FabricantesService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $fabricantes = Fabricante::with('contato')
            ->with('endereco')
            ->where('ativo','=',1)
            ->paginate(5);

        return view('fabricante.index',compact('fabricantes'));
    }


    public function create()
    {
        return view('fabricante.create');
    }

    public function store(FabricantesCreateRequest $request)
    {
        $fabricante = $this->service->create($request);
        return redirect(route('fabricantes.index'));
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        $fabricante = Fabricante::with('contato')
            ->with('endereco')
            ->where('id','=',$id)->first();

        $bancos = Banco::all();

        return view('fabricante.create',compact('bancos','fabricante'));
    }

    public function update(FabricantesCreateRequest $request, $id)
    {
        $fabricante = $this->service->update($request, $id);
        return redirect(route('fabricantes.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)){
            return redirect(route('fabricantes.index'));
        }
    }
}
