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
use Illuminate\Support\Facades\DB;

class MercadoriaService
{
    public function create(MercadoriaCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

                // mercadoria
                $mercadoria = new Mercadoria();
                $idSubGrupo = str_replace("'","",$request->input("sub_grupo_id"));

                $mercadoria->nome              = $request->input("nome");
                $mercadoria->observacao        = $request->input("observacao");
                // foreignKeys
                $grupo                         = Grupo::findOrFail($request->input("grupo_id"));
                $mercadoria->grupo_id          = $grupo->id;
                $subGrupo                      = SubGrupo::findOrFail($idSubGrupo);
                $mercadoria->sub_grupo_id      = $subGrupo->id;
                $ncm                           = NCM::findOrFail($request->input("ncm_id"));
                $mercadoria->ncm_id            = $ncm->id;
                $fornecedor                    = Fornecedor::findOrFail($request->input("fornecedor_id"));
                $mercadoria->fornecedor_id     = $fornecedor->id;
                $unidadeMedida                 = UnidadeMedida::findOrFail($request->input("unidade_medida_id"));
                $mercadoria->unidade_medida_id = $unidadeMedida->id;
                $unidadeCaixa                  = UnidadeCaixa::findOrFail($request->input("unidade_caixa_id"));
                $mercadoria->unidade_caixa_id  = $unidadeCaixa->id;
                $categoria                     = Categoria::findOrFail($request->input("categoria_id"));
                $mercadoria->categoria_id      = $categoria->id;
                $colecao                       = Colecao::findOrFail($request->input("colecao_id"));
                $mercadoria->colecao_id        = $colecao->id;
                $linha                         = Linha::findOrFail($request->input("linha_id"));
                $mercadoria->linha_id          = $linha->id;
                $marca                         = Marca::findOrFail($request->input("marca_id"));
                $mercadoria->marca_id          = $marca->id;

                $mercadoria->save();

                $mercadoria->save();

                // preco_custo
                $precoCusto = new PrecoCusto();
                $precoCusto->valor          = $request->input("valor_custo");
                $precoCusto->data           = Carbon::now()->format('Ymd');
                $precoCusto->mercadoria_id  = $mercadoria->id;
                $precoCusto->fornecedor_id  = $mercadoria->fornecedor_id;
                $precoCusto->save();

                // tabela_preco
                $tabelaPreco = new TabelaPreco();
                $tabelaPreco->descricao       = $request->input("descricao_preco_venda");
                $tabelaPreco->observacao      = $request->input("observacao_preco_venda");
                $tabelaPreco->desconto_maximo = $request->input("desconto_venda");
                $tabelaPreco->validade        = $request->input("validade_venda");
                $tabelaPreco->save();

                // preco_venda
                $precoVenda = new PrecoVenda();
                $precoVenda->valor            = $request->input("valor_venda");
                $precoVenda->data             = Carbon::now()->format('Ymd');
                $precoVenda->mercadoria_id    = $mercadoria->id;
                $precoVenda->tabela_preco_id  = $tabelaPreco->id;
                $precoVenda->save();


                return $mercadoria;

        });
    }


    public function update(MercadoriaCreateRequest $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            // mercadoria
            $idSubGrupo = str_replace("'","",$request->input("sub_grupo_id"));

            $mercadoria = Mercadoria::findOrfail($id);

            $mercadoria->nome              = $request->input("nome");
            $mercadoria->observacao        = $request->input("observacao");
            // foreignKeys
            $grupo                         = Grupo::findOrFail($request->input("grupo_id"));
            $mercadoria->grupo_id          = $grupo->id;
            $subGrupo                      = SubGrupo::findOrFail($idSubGrupo);
            $mercadoria->sub_grupo_id      = $subGrupo->id;
            $ncm                           = NCM::findOrFail($request->input("ncm_id"));
            $mercadoria->ncm_id            = $ncm->id;
            $fornecedor                    = Fornecedor::findOrFail($request->input("fornecedor_id"));
            $mercadoria->fornecedor_id     = $fornecedor->id;
            $unidadeMedida                 = UnidadeMedida::findOrFail($request->input("unidade_medida_id"));
            $mercadoria->unidade_medida_id = $unidadeMedida->id;
            $unidadeCaixa                  = UnidadeCaixa::findOrFail($request->input("unidade_caixa_id"));
            $mercadoria->unidade_caixa_id  = $unidadeCaixa->id;
            $categoria                     = Categoria::findOrFail($request->input("categoria_id"));
            $mercadoria->categoria_id      = $categoria->id;
            $colecao                       = Colecao::findOrFail($request->input("colecao_id"));
            $mercadoria->colecao_id        = $colecao->id;
            $linha                         = Linha::findOrFail($request->input("linha_id"));
            $mercadoria->linha_id          = $linha->id;
            $marca                         = Marca::findOrFail($request->input("marca_id"));
            $mercadoria->marca_id          = $marca->id;

            $mercadoria->save();

            // preco_custo
            $precoCusto = PrecoCusto::findOrFail($request->input('preco_custo_id'));
            $precoCusto->valor          = $request->input("valor_custo");
            $precoCusto->mercadoria_id  = $mercadoria->id;
            $precoCusto->fornecedor_id  = $mercadoria->fornecedor_id;
            $precoCusto->save();

            // preco_venda
            $precoVenda = PrecoVenda::findOrFail($request->input('preco_venda_id'));
            $precoVenda->valor            = $request->input("valor_venda");
            $precoVenda->mercadoria_id    = $mercadoria->id;
            $precoVenda->save();

            // tabela_preco
            $tabelaPreco = TabelaPreco::findOrFail($precoVenda->tabela_preco_id);
            $tabelaPreco->descricao       = $request->input("descricao_preco_venda");
            $tabelaPreco->observacao      = $request->input("observacao_preco_venda");
            $tabelaPreco->desconto_maximo = $request->input("desconto_venda");
            $tabelaPreco->validade        = $request->input("validade_venda");
            $tabelaPreco->save();

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