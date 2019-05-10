<?php

namespace App\Http\Controllers\Api;

use App\Models\PrecoCusto;
use App\Models\PrecoVenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrecosMercadoriaController extends Controller
{

    public function index()
    {
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $precoCusto = PrecoCusto::where('mercadoria_id','=',$id)->get();
        $precoVenda = PrecoVenda::with('observacoes')
                                 ->where('mercadoria_id','=',$id)->get();


        $response = [];

        foreach ($precoCusto as $preco) {
            $response [] = $preco;
        }

        foreach ($precoVenda as $preco) {
            $response [] = $preco;
        }

        return $response;
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
