<?php

namespace App\Http\Controllers\Api;

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
        $ncms =  NCM::list();
        return $ncms;
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
