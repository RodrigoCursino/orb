<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\FornecedorCreateRequest;
use App\Models\Banco;
use App\Models\Fornecedor;
use App\Service\FornecedorService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FornecedoresController extends Controller
{
    private  $service;

    public function __construct(FornecedorService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $fornecedores = Fornecedor::with('contato')
                                  ->with('endereco')
                                  ->with('dadosBancarios')
                                  ->where('ativo','=',1)
                                  ->paginate(5);

        return view('fornecedor.index',compact('fornecedores'));
    }


    public function create()
    {
        $bancos = Banco::all();
        return view('fornecedor.create',compact('bancos'));
    }

    public function store(FornecedorCreateRequest $request)
    {
        $fornecedor = $this->service->create($request);
        return redirect(route('fornecedores.index'));
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        $fornecedor = Fornecedor::with('contato')
            ->with('endereco')
            ->with('dadosBancarios')
            ->where('id','=',$id)->first();

        $bancos = Banco::all();

        return view('fornecedor.create',compact('bancos','fornecedor'));
    }

    public function update(FornecedorCreateRequest $request, $id)
    {
        $fornecedor = $this->service->update($request, $id);
        return redirect(route('fornecedores.index'));
    }


    public function destroy($id)
    {
       if($this->service->destroy($id)){
         return redirect(route('fornecedores.index'));
       }
    }
}
