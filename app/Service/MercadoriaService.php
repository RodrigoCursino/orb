<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 03/04/2019
 * Time: 16:24
 */

namespace App\Service;


use App\Http\Requests\MercadoriaCreateRequest;
use App\Models\Mercadoria;
use App\Models\PrecoCusto;
use App\Models\PrecoVenda;
use App\Models\TabelaPreco;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MercadoriaService
{
    public function create(MercadoriaCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

                // mercadoria
                $mercadoria = new Mercadoria();
                $mercadoria->fornecedor_id  = $request->input("fornecedor_id");
                $mercadoria->grupo_id       = $request->input("grupo_id");
                $mercadoria->sub_grupo_id   = $request->input("sub_grupo_id");
                $mercadoria->nome           = $request->input("nome");
                $mercadoria->ncm            = $request->input("ncm");
                $mercadoria->observacao     = $request->input("observacao");
                $mercadoria->unidade_medida = $request->input("unidade_medida");
                $mercadoria->unidade_caixa  = $request->input("unidade_caixa");

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
            $mercadoria->fornecedor_id  = $request->input("fornecedor_id");
            $mercadoria->grupo_id       = $request->input("grupo_id");
            $mercadoria->sub_grupo_id   = $idSubGrupo;
            $mercadoria->nome           = $request->input("nome");
            $mercadoria->ncm            = $request->input("ncm");
            $mercadoria->observacao     = $request->input("observacao");
            $mercadoria->unidade_medida = $request->input("unidade_medida");
            $mercadoria->unidade_caixa  = $request->input("unidade_caixa");

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