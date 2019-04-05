<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\MercadoriaCreateRequest;
use App\Models\Banco;
use App\Models\Fornecedor;
use App\Models\Grupo;
use App\Models\Mercadoria;
use App\Service\MercadoriaService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MercadoriasController extends Controller
{

    private $service;
    /**
     * MercadoriasController constructor.
     */
    public function __construct(MercadoriaService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $mercadorias = Mercadoria::all();
        return $mercadorias;
    }

    public function create()
    {
        $fornecedores = Fornecedor::all();
        $grupos       = Grupo::all();
        $bancos       = Banco::all();
        return view('mercadoria.create',compact('fornecedores','bancos','grupos'));
    }

    public function store(MercadoriaCreateRequest $request)
    {
        $mercadoria = $this->service->create($request);
        return redirect(route('mercadorias.index'));
    }

    public function show($id)
    {
        $mercadoria = Mercadoria::with('precoVenda')
                                  ->with('PrecoCusto')
                                  ->with('subGrupo')
                                  ->where('id','=',$id)
                                  ->first();
        dd($mercadoria->toArray());
    }

    public function edit($id)
    {
        $mercadoria = Mercadoria::with('precoVenda')
                                ->with('PrecoCusto')
                                ->with('subGrupo')
                                ->where('id','=',$id)
                                ->first();
        $fornecedores = Fornecedor::all();
        $grupos       = Grupo::all();
        $bancos       = Banco::all();
        return view('mercadoria.create', compact('mercadoria','fornecedores','bancos','grupos'));
    }

    public function update(MercadoriaCreateRequest $request, $id)
    {
        $mercadoria = $this->service->update($request,$id);
        return redirect(route('mercadorias.index'));
    }

    public function destroy($id)
    {
       if($this->service->destroy($id)) {
         return redirect(route('mercadorias.index'));
       }
    }
}
