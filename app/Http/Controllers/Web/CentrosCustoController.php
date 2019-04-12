<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\CentrosCustoCreateRequest;
use App\Models\Banco;
use App\Models\CentroCusto;
use App\Http\Controllers\Controller;
use App\Service\CentroCustoService;

class CentrosCustoController extends Controller
{

    private $service;

    public function __construct(CentroCustoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $centrosCusto =  CentroCusto::where('ativo','=',1)
            ->paginate(15);

        return view('centro-custo.index',compact('centrosCusto'));
    }


    public function create()
    {
        $bancos = Banco::list();
        return view('centro-custo.create', compact('bancos'));
    }

    public function store(CentrosCustoCreateRequest $request)
    {
        $centroCusto = $this->service->create($request);
        return redirect(route('centroscusto.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $centroCusto = CentroCusto::with('dadosBancarios')
                       ->where('id','=',$id)->first();
        $bancos = Banco::list();
        return view('centro-custo.create',compact('centroCusto','bancos'));
    }


    public function update(CentrosCustoCreateRequest $request, $id)
    {
        $categoria = $this->service->update($request, $id);
        return redirect(route('centroscusto.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return redirect(route('centroscusto.index'));
        }
    }
}
