<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ShippingMethodCrudService;
use App\Http\Requests\ShippingMethodRequest;

class ShippingMethodController extends Controller
{
    protected $shippingMethodCrudService;

    public function __construct(ShippingMethodCrudService $shippingMethodCrudService)
    {
        $this->shippingMethodCrudService = $shippingMethodCrudService;
    }

    public function index(Request $request)
    {
        $data = $this->shippingMethodCrudService->getShippingMethodList($request);
        return view('Backend.admin.shipping.list', $data);
    }

    public function create()
    {
        return view('Backend.admin.shipping.create');
    }

    public function store(ShippingMethodRequest $request)
    {
        $this->shippingMethodCrudService->createShippingMethod($request);
        return redirect()->route('shipping-method.index')->with('success', 'Shipping method created successfully');
    }

    public function edit($id)
    {
        $data = $this->shippingMethodCrudService->editShippingMethod($id);
        return view('Backend.admin.shipping.edit', $data);
    }

    public function update(ShippingMethodRequest $request, $id)
    {
        $this->shippingMethodCrudService->updateShippingMethod($request, $id);
        return redirect()->route('shipping-method.index')->with('success', 'Shipping method updated successfully');
    }

    public function destroy($id)
    {
        $this->shippingMethodCrudService->deleteShippingMethod($id);
        session()->flash('success', 'Shipping method deleted successfully');
    }

    public function status($id)
    {
        $this->shippingMethodCrudService->statusUpdate($id);
        session()->flash('success', 'Shipping method status updated successfully');
    }
}
