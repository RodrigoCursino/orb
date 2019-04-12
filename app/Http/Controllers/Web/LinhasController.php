<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\LinhaCreateRequest;
use App\Models\Linha;
use App\Service\LinhaService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinhasController extends Controller
{

    private $service;

    public function __construct(LinhaService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $linhas =  Linha::where('ativo','=',1)
                   ->paginate(15);

        return view('linha.index',compact('linhas'));
    }


    public function create()
    {
        return view('linha.create');
    }

    public function store(LinhaCreateRequest $request)
    {
        $linha = $this->service->create($request);
        return redirect(route('linhas.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $linha = Linha::findOrFail($id);
        return view('linha.create',compact('linha'));
    }


    public function update(LinhaCreateRequest $request, $id)
    {
        $linha = $this->service->update($request, $id);
        return redirect(route('linhas.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return redirect(route('linhas.index'));
        }
    }
}
