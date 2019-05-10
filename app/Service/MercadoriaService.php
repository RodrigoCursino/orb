<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 03/04/2019
 * Time: 16:24
 */

namespace App\Service;


use App\Http\Requests\MercadoriaCreateRequest;
use App\Models\Categoria;
use App\Models\Colecao;
use App\Models\Fornecedor;
use App\Models\Grupo;
use App\Models\Linha;
use App\Models\Marca;
use App\Models\Mercadoria;
use App\Models\NCM;
use App\Models\PrecoCusto;
use App\Models\PrecoVenda;
use App\Models\SubGrupo;
use App\Models\TabelaPreco;
use App\Models\UnidadeCaixa;
use App\Models\UnidadeMedida;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MercadoriaService
{
    public function create(Request $request)
    {
        return DB::transaction(function () use ($request) {

                // mercadoria
                $mercadoria = new Mercadoria();

                $mercadoria->nome              = $request->input("nome");
                $mercadoria->observacao        = $request->input("observacao");
                // foreignKeys
                $grupo                         = Grupo::findOrFail($request->input("grupo")['id']);
                $mercadoria->grupo_id          = $grupo->id;
                $subGrupo                      = SubGrupo::findOrFail($request->input("sub_grupo")['id']);
                $mercadoria->sub_grupo_id      = $subGrupo->id;
                $ncm                           = NCM::findOrFail($request->input("ncm")['id']);
                $mercadoria->ncm_id            = $ncm->id;
                $fornecedor                    = Fornecedor::findOrFail($request->input("fornecedor")['id']);
                $mercadoria->fornecedor_id     = $fornecedor->id;
                $unidadeMedida                 = UnidadeMedida::findOrFail($request->input("unidade_medida")['id']);
                $mercadoria->unidade_medida_id = $unidadeMedida->id;
                $unidadeCaixa                  = UnidadeCaixa::findOrFail($request->input("unidade_varejo")['id']);
                $mercadoria->unidade_caixa_id  = $unidadeCaixa->id;
                $categoria                     = Categoria::findOrFail($request->input("categoria")['id']);
                $mercadoria->categoria_id      = $categoria->id;
                $colecao                       = Colecao::findOrFail($request->input("colecao")['id']);
                $mercadoria->colecao_id        = $colecao->id;
                $linha                         = Linha::findOrFail($request->input("linha")['id']);
                $mercadoria->linha_id          = $linha->id;
                $marca                         = Marca::findOrFail($request->input("marca")['id']);
                $mercadoria->marca_id          = $marca->id;

                $mercadoria->save();


//                // preco_custo
//                $precoCusto = new PrecoCusto();
//
//                $precoCusto->valor          = $request->input('preco_custo')['valor'];
//                $precoCusto->data           = Carbon::now()->format('Ymd');
//                $precoCusto->mercadoria_id  = $mercadoria->id;
//                $precoCusto->fornecedor_id  = $mercadoria->fornecedor_id;
//                $precoCusto->save();
//
//                // tabela_preco
//                $tabelaPreco = new TabelaPreco();
//                $tabelaPreco->descricao       = $request->input('preco_venda')['observacoes']['descricao'];
//                $tabelaPreco->observacao      = $request->input('preco_venda')['observacoes']['observacao'];
//                $tabelaPreco->desconto_maximo = $request->input('preco_venda')['observacoes']['desconto_maximo'];
//                $tabelaPreco->validade        = $request->input('preco_venda')['observacoes']['validade'];
//                $tabelaPreco->save();
//
//                // preco_venda
//                $precoVenda = new PrecoVenda();
//                $precoVenda->valor            = $request->input('preco_venda')['valor'];
//                $precoVenda->data             = Carbon::now()->format('Ymd');
//                $precoVenda->mercadoria_id    = $mercadoria->id;
//                $precoVenda->tabela_preco_id  = $tabelaPreco->id;
//                $precoVenda->save();


                return $mercadoria;

        });
    }


    public function update(MercadoriaCreateRequest $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {


            $mercadoria = Mercadoria::findOrfail($id);

            $mercadoria->nome              = $request->input("nome");
            $mercadoria->observacao        = $request->input("observacao");
            // foreignKeys
            $grupo                         = Grupo::findOrFail($request->input("grupo")['id']);
            $mercadoria->grupo_id          = $grupo->id;
            $subGrupo                      = SubGrupo::findOrFail($request->input("sub_grupo")['id']);
            $mercadoria->sub_grupo_id      = $subGrupo->id;
            $ncm                           = NCM::findOrFail($request->input("ncm")['id']);
            $mercadoria->ncm_id            = $ncm->id;
            $fornecedor                    = Fornecedor::findOrFail($request->input("fornecedor")['id']);
            $mercadoria->fornecedor_id     = $fornecedor->id;
            $unidadeMedida                 = UnidadeMedida::findOrFail($request->input("unidade_medida")['id']);
            $mercadoria->unidade_medida_id = $unidadeMedida->id;
            $unidadeCaixa                  = UnidadeCaixa::findOrFail($request->input("unidade_varejo")['id']);
            $mercadoria->unidade_caixa_id  = $unidadeCaixa->id;
            $categoria                     = Categoria::findOrFail($request->input("categoria")['id']);
            $mercadoria->categoria_id      = $categoria->id;
            $colecao                       = Colecao::findOrFail($request->input("colecao")['id']);
            $mercadoria->colecao_id        = $colecao->id;
            $linha                         = Linha::findOrFail($request->input("linha")['id']);
            $mercadoria->linha_id          = $linha->id;
            $marca                         = Marca::findOrFail($request->input("marca")['id']);
            $mercadoria->marca_id          = $marca->id;

            $mercadoria->save();


            // preco_custo
//            $precoCusto = PrecoCusto::findOrFail($request->input('preco_custo_id'));
//            $precoCusto->valor          = $request->input("valor_custo");
//            $precoCusto->mercadoria_id  = $mercadoria->id;
//            $precoCusto->fornecedor_id  = $mercadoria->fornecedor_id;
//            $precoCusto->save();

            // preco_venda
//            $precoVenda = PrecoVenda::findOrFail($request->input('preco_venda_id'));
//            $precoVenda->valor            = $request->input("valor_venda");
//            $precoVenda->mercadoria_id    = $mercadoria->id;
//            $precoVenda->save();

            // tabela_preco
//            $tabelaPreco = TabelaPreco::findOrFail($precoVenda->tabela_preco_id);
//            $tabelaPreco->descricao       = $request->input("descricao_preco_venda");
//            $tabelaPreco->observacao      = $request->input("observacao_preco_venda");
//            $tabelaPreco->desconto_maximo = $request->input("desconto_venda");
//            $tabelaPreco->validade        = $request->input("validade_venda");
//            $tabelaPreco->save();

            return $mercadoria;
        });

    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {
            $mercadoria = Mercadoria::findOrFail($id);

            // delete Preço de Venda
            $precoVenda = PrecoVenda::where('mercadoria_id','=',$id)->get();

            foreach ($precoVenda as $preco) {
                $tabelePreco = TabelaPreco::findOrFail($preco->tabela_preco_id);
                $tabelePreco->delete();
                $preco->delete();
            }

            // delete Preço custo
            $precoCusto = PrecoCusto::where('mercadoria_id','=',$id)->get();
            foreach ($precoCusto as $preco) {
                $preco->delete();
            }

            $mercadoria->delete();

            return true;

        });
    }
}