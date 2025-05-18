<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CuponCrudService;

class CuponController extends Controller
{
    protected $cuponCrudService;

    public function __construct(CuponCrudService $cuponCrudService)
    {
        $this->cuponCrudService = $cuponCrudService;
    }

    public function index(Request $request)
    {
        $data = $this->cuponCrudService->getCuponList($request);
        return view('Backend.admin.cupon.list', $data);
    }

    public function create()
    {
        return view('Backend.admin.cupon.create');
    }

    public function store(Request $request)
    {
        $this->cuponCrudService->createCupon($request);
        return redirect()->route('cupon.index')->with('success', 'Cupon created successfully');
    }

    public function edit($id)
    {
        $data = $this->cuponCrudService->editCupon($id);
        return view('Backend.admin.cupon.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->cuponCrudService->updateCupon($request, $id);
        return redirect()->route('cupon.index')->with('success', 'Cupon updated successfully');
    }

    public function destroy($id)
    {
        $this->cuponCrudService->deleteCupon($id);
        session()->flash('success', 'Cupon deleted successfully');
    }

    public function status($id)
    {
        $this->cuponCrudService->statusUpdate($id);
        session()->flash('success', 'Cupon status updated successfully');
    }
}
