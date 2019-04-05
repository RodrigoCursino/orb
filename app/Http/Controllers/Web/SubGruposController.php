<?php

namespace App\Http\Controllers\Web;

use App\Models\SubGrupo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubGruposController extends Controller
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
        $subGrupos = SubGrupo::where('grupo_id','=',$id)
                     ->get();

        return $subGrupos->toArray();
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
