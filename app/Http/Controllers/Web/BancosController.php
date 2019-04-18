<?php

namespace App\Http\Controllers\Web;

use App\Models\Banco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BancosController extends Controller
{

    public function index()
    {
        return Banco::list();
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
        //
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
