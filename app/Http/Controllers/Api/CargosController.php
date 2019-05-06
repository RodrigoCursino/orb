<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CargosCreateRequest;
use App\Models\Cargo;
use App\Service\CargosService;
use App\Http\Controllers\Controller;

class CargosController extends Controller
{

    private $service;

    public function __construct(CargosService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return  Cargo::list();
    }


    public function create()
    {
        return view('cargo.create');
    }

    public function store(CargosCreateRequest $request)
    {
        $cargo = $this->service->create($request);
        return redirect(route('cargos.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cargo = Cargo::findOrFail($id);
        return view('cargo.create',compact('cargo'));
    }


    public function update(CargosCreateRequest $request, $id)
    {
        $cargo = $this->service->update($request, $id);
        return redirect(route('cargos.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return redirect(route('cargos.index'));
        }
    }
}
