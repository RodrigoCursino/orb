<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\GrupoCreateRequest;
use App\Models\Grupo;
use App\Models\NCM;
use App\Service\GrupoService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GruposController extends Controller
{

    private $service;

    public function __construct(GrupoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $grupos = Grupo::with('ncm')->where('ativo','=',1)->get();

        return $grupos;
    }

    public function create()
    {
        $ncms  = NCM::all();
        return view('grupo.create', compact('ncms'));
    }

    public function store(GrupoCreateRequest $request)
    {
        $grupo = $this->service->create($request);
        return  [
            "data" => $grupo,
            "message"   => "Grupo Salvo Com Sucesso",
        ];
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $grupo = Grupo::findOrFail($id);
        $ncms  = NCM::all();
        return view('grupo.create', compact('grupo','ncms'));
    }

    public function update(GrupoCreateRequest $request)
    {
        $grupo = $this->service->update($request, $request->input('id'));
        return  [
            "data" => $grupo,
            "message"   => "Grupo Editada Com Sucesso",
        ];
    }

    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return "Deletado com sucesso!!!";
        }
    }
}
