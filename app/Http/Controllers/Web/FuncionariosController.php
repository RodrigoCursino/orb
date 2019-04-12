<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\FuncionariosCreateRequest;
use App\Models\Banco;
use App\Models\Cargo;
use App\Models\Funcionario;
use App\Models\Unidade;
use App\Service\FuncionariosService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FuncionariosController extends Controller
{
    private  $service;

    public function __construct(FuncionariosService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $funcionarios = Funcionario::with('contato')
            ->with('endereco')
            ->with('dadosBancarios')
            ->with('departamento')
            ->with('unidade')
            ->with('cargo')
            ->where('ativo','=',1)
            ->paginate(5);

        return view('funcionario.index',compact('funcionarios'));
    }


    public function create()
    {
        $bancos   = Banco::list();
        $unidades = Unidade::list();
        $cargos   = Cargo::list();
        return view('funcionario.create',compact('bancos','unidades','cargos'));
    }

    public function store(FuncionariosCreateRequest $request)
    {
        $fornecedor = $this->service->create($request);
        return redirect(route('funcionarios.index'));
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        $funcionario = Funcionario::with('contato')
            ->with('endereco')
            ->with('departamento')
            ->with('departamento')
            ->with('dadosBancarios')
            ->where('id','=',$id)->first();

        $bancos   = Banco::list();
        $unidades = Unidade::list();
        $cargos   = Cargo::list();

        return view('funcionario.create',compact('bancos','funcionario','unidades','cargos'));
    }

    public function update(FuncionariosCreateRequest $request, $id)
    {
        $funcionario = $this->service->update($request, $id);
        return redirect(route('funcionarios.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)){
            return redirect(route('funcionarios.index'));
        }
    }
}
