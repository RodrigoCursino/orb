<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\NCMsCreateRequest;
use App\Models\NCM;
use App\Service\NCMsService;
use App\Http\Controllers\Controller;

class NCMsController extends Controller
{

    private $service;

    public function __construct(NCMsService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $ncms =  NCM::where('ativo','=',1)
            ->paginate(15);

        return view('ncm.index',compact('ncms'));
    }


    public function create()
    {
        return view('ncm.create');
    }

    public function store(NCMsCreateRequest $request)
    {
        $ncm = $this->service->create($request);
        return redirect(route('ncms.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $ncm = NCM::findOrFail($id);
        return view('ncm.create',compact('ncm'));
    }


    public function update(NCMsCreateRequest $request, $id)
    {
        $ncm = $this->service->update($request, $id);
        return redirect(route('ncms.index'));
    }


    public function destroy($id)
    {
        if($this->service->destroy($id)) {
            return redirect(route('ncms.index'));
        }
    }
}
