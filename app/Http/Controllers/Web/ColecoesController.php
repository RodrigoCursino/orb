<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\LinhaCreateRequest;
use App\Models\Colecao;
use App\Service\ColecoesService;
use App\Service\LinhaService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColecoesController extends Controller
{

    private $service;

    public function __construct(ColecoesService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $colecoes =  Colecao::where('ativo','=',1)
            ->paginate(15);

        return view('colecao.index',compact('colecoes'));
    }


    public function create()
    {
        return view('colecao.create');
    }

    public function store(LinhaCreateRequest $request)
    {
        $colecao = $this->service->create($request);
        return redirect(route('colecoes.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $colecao = Colecao::findOrFail($id);
        return view('colecao.create',compact('colecao'));
    }


    public function update(LinhaCreateRequest $request, $id)
    {
        $colecao = $this->service->update($request, $id);
        return redirect(route('colecoes.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return redirect(route('colecoes.index'));
        }
    }
}
