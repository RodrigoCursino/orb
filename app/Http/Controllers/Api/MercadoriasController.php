<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\MercadoriaCreateRequest;
use App\Models\Banco;
use App\Models\Categoria;
use App\Models\Colecao;
use App\Models\Fornecedor;
use App\Models\Grupo;
use App\Models\Linha;
use App\Models\Marca;
use App\Models\Mercadoria;
use App\Models\NCM;
use App\Models\UnidadeCaixa;
use App\Models\UnidadeMedida;
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
        $mercadorias = Mercadoria::with('precoVenda')
                                  ->with('PrecoCusto')
                                  ->with('subGrupo')
                                  ->with('unidadeMedida')
                                  ->with('unidadeCaixa')
                                  ->with('grupo')
                                  ->with('ncm')
                                  ->with('fornecedor')
                                  ->with('precoVenda')
                                  ->with('precoCusto')
                                  ->with('marca')
                                  ->with('linha')
                                  ->with('colecao')
                                  ->with('categoria')->get();

        return $mercadorias;
    }

    public function create()
    {
        $fornecedores    = Fornecedor::list();
        $ncms            = NCM::list();
        $unidadesMedida  = UnidadeMedida::list();
        $unidadesCaixa   = UnidadeCaixa::list();
        $colecoes        = Colecao::list();
        $categorias      = Categoria::list();
        $grupos          = Grupo::list();
        $bancos          = Banco::list();
        $linhas          = Linha::list();
        $marcas          = Marca::list();


        return view('mercadoria.create',
            compact(
                'fornecedores',
                     'bancos',
                       'grupos',
                       'ncms',
                       'categorias',
                       'linhas',
                       'marcas',
                       'colecoes',
                       'unidadesCaixa',
                       'unidadesMedida'
            ));
    }

    public function store(Request $request)
    {
        $mercadoria = $this->service->create($request);
        return $mercadoria;
    }

    public function show($id)
    {
        $mercadoria = Mercadoria::with('precoVenda')
                                  ->with('PrecoCusto')
                                  ->with('subGrupo')
                                  ->with('ncm')
                                  ->with('marca')
                                  ->with('linha')
                                  ->with('colecao')
                                  ->with('categoria')
                                  ->where('id','=',$id)
                                  ->first();
        dd($mercadoria->toArray());
    }

    public function edit($id)
    {
        $mercadoria = Mercadoria::with('precoVenda')
            ->with('PrecoCusto')
            ->with('subGrupo')
            ->with('ncm')
            ->with('marca')
            ->with('linha')
            ->with('colecao')
            ->with('categoria')
            ->where('id','=',$id)
            ->first();
        $fornecedores    = Fornecedor::all();
        $ncms            = NCM::all();
        $unidadesMedida  = UnidadeMedida::all();
        $unidadesCaixa   = UnidadeCaixa::all();
        $colecoes        = Colecao::all();
        $categorias      = Categoria::all();
        $grupos          = Grupo::all();
        $bancos          = Banco::all();
        $linhas          = Linha::all();
        $marcas          = Marca::all();

        return view('mercadoria.create',
               compact(
                 'mercadoria',
                      'fornecedores',
                        'bancos',
                        'grupos',
                        'ncms',
                        'categorias',
                        'colecoes',
                        'unidadesMedida',
                        'unidadesCaixa',
                        'linhas',
                        'marcas'
                      )
               );
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
