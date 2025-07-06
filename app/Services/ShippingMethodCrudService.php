<?php

namespace App\Services;

use App\Models\ShippingMethod;




class ShippingMethodCrudService
{


    public function getShippingMethodList($request)
    {
        $data['search'] = $search = $request->input('search');
        $data['sortBy'] = $sortBy = $request->input('sort_by', 'id');
        $data['sortDirection'] = $sortDirection = $request->input('sort_direction', 'desc');
        $data['shippingMethods'] = ShippingMethod::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->orderBy($sortBy, $sortDirection)
        ->paginate(10);
        return $data;     
    }

    public function createShippingMethod($request)
    {
        $validated = $request->validated();

        $validated['status'] = $request->has('status') ? 1 : 0;

        return ShippingMethod::create($validated);
    }

    public function editShippingMethod($id)
    {
        $data['shippingMethod'] = ShippingMethod::findOrFail($id);
        return $data;
    }


    public function updateShippingMethod($request, $id)
    {
        $shipping = ShippingMethod::findOrFail($id);

        $validated = $request->validated();
        $validated['status'] = $request->has('status') ? 1 : 0;

        $shipping->update($validated);

        return $shipping;
    }

    public function deleteShippingMethod($id)
    {
        $shippingMethod = ShippingMethod::find($id);
        $shippingMethod->delete();
    }

    public function statusUpdate($id)
    {
        $shippingMethod = ShippingMethod::find($id);
        $shippingMethod->status = !$shippingMethod->status;
        $shippingMethod->save();
    }

}
