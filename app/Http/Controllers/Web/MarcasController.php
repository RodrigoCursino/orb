<?php

namespace App\Http\Controllers\Web;

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
        $marcas =  Marca::with('fabricante')
            ->where('ativo','=',1)
            ->paginate(15);

        return view('marca.index',compact('marcas'));
    }


    public function create()
    {
        $fabricantes = Fabricante::list();
        return view('marca.create',compact('fabricantes'));
    }

    public function store(MarcasCreateRequest $request)
    {
        $marca = $this->service->create($request);
        return redirect(route('marcas.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $marca       = Marca::with('fabricante')
                             ->where('id','=',$id)->first();
        $fabricantes = Fabricante::list();
        return view('marca.create',compact('marca','fabricantes'));
    }


    public function update(MarcasCreateRequest $request, $id)
    {
        $marca = $this->service->update($request, $id);
        return redirect(route('marcas.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return redirect(route('marcas.index'));
        }
    }
}
