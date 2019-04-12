<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\SubGrupoCreateRequest;
use App\Models\Grupo;
use App\Models\SubGrupo;
use App\Service\SubGruposService;
use App\Http\Controllers\Controller;

class SubGruposController extends Controller
{

    private $service;

    public function __construct(SubGruposService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $subGrupos =  SubGrupo::with('grupo')
            ->where('ativo','=',1)
            ->paginate(15);

        return view('sub-grupo.index',compact('subGrupos'));
    }


    public function create()
    {
        $grupos = Grupo::list();
        return view('sub-grupo.create',compact('grupos'));
    }

    public function store(SubGrupoCreateRequest $request)
    {
        $categoria = $this->service->create($request);
        return redirect(route('subgrupos.index'));
    }


    public function show($id)
    {
        $subGrupos = SubGrupo::where('grupo_id','=',$id)
                     ->get();

        return $subGrupos->toArray();
    }


    public function edit($id)
    {
        $subGrupo = SubGrupo::with('grupo')
                            ->where('id','=',$id)
                            ->first();
        $grupos = Grupo::list();
        return view('sub-grupo.create',compact('subGrupo','grupos'));
    }


    public function update(SubGrupoCreateRequest $request, $id)
    {
        $categoria = $this->service->update($request, $id);
        return redirect(route('subgrupos.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return redirect(route('subgrupos.index'));
        }
    }
}
