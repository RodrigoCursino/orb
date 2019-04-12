<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\RetencaoCreateRequest;
use App\Models\Retencao;
use App\Service\RetencoesService;
use App\Http\Controllers\Controller;

class RetencoesController extends Controller
{

    private $service;

    public function __construct(RetencoesService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $retencoes =  Retencao::where('ativo','=',1)
            ->paginate(15);

        return view('retencao.index',compact('retencoes'));
    }


    public function create()
    {
        return view('retencao.create');
    }

    public function store(RetencaoCreateRequest $request)
    {
        $retencao = $this->service->create($request);
        return redirect(route('retencoes.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $retencao = Retencao::findOrFail($id);
        return view('retencao.create',compact('retencao'));
    }


    public function update(RetencaoCreateRequest $request, $id)
    {
        $retencao = $this->service->update($request, $id);
        return redirect(route('retencoes.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return redirect(route('retencoes.index'));
        }
    }
}
