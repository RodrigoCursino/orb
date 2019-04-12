<?php

namespace App\Http\Controllers\Web;

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
        $grupos = Grupo::with('ncm')
                         ->where('ativo','=',1)
                         ->paginate(15);
        return view('grupo.index',compact('grupos'));
    }

    public function create()
    {
        $ncms  = NCM::all();
        return view('grupo.create', compact('ncms'));
    }

    public function store(GrupoCreateRequest $request)
    {
        $grupo = $this->service->create($request);
        return redirect(route('grupos.index'));
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

    public function update(GrupoCreateRequest $request, $id)
    {
        $grupo = $this->service->update($request, $id);
    }

    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return redirect(route('grupos.index'));
        }
    }
}
