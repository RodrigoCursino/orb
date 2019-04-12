<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\ContaContabeisCreateRequest;
use App\Http\Requests\LinhaCreateRequest;
use App\Models\Categoria;
use App\Models\ContaContabil;
use App\Service\CategoriaService;
use App\Service\ContaContabilService;
use App\Service\LinhaService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContaContabeisController extends Controller
{

    private $service;

    public function __construct(ContaContabilService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $contaContabeis =  ContaContabil::where('ativo','=',1)
            ->paginate(15);

        return view('conta-contabil.index',compact('contaContabeis'));
    }


    public function create()
    {
        return view('conta-contabil.create');
    }

    public function store(ContaContabeisCreateRequest $request)
    {
        $categoria = $this->service->create($request);
        return redirect(route('contacontabeis.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $contaContabil = ContaContabil::findOrFail($id);
        return view('conta-contabil.create',compact('contaContabil'));
    }


    public function update(ContaContabeisCreateRequest $request, $id)
    {
        $categoria = $this->service->update($request, $id);
        return redirect(route('contacontabeis.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return redirect(route('contacontabeis.index'));
        }
    }
}
