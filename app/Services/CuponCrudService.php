<?php

namespace App\Services;

use App\Models\Cupon;
use Illuminate\Validation\ValidationException;

class CuponCrudService
{

    public function getCuponList($request)
    {
        $data['search'] = $search = $request->input('search');
        $data['sortBy'] = $sortBy = $request->input('sort_by', 'id');
        $data['sortDirection'] = $sortDirection = $request->input('sort_direction', 'desc');
        $data['cupons'] = Cupon::query()
            ->when($search, function ($query, $search) {
                return $query->where('code', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);
        return $data;
    }

    public function createCupon($request)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:cupons,code',
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'min_purchase' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'nullable|integer|in:0,1',
        ]);

        if(Cupon::where('code', $request->code)->exists()){
            throw ValidationException::withMessages([
                'error' => "Coupon code already exists."
            ]);
        }
        $cupon = new Cupon();
        $cupon->code = $request->code;
        $cupon->type = $request->type;
        $cupon->value = $request->value;
        $cupon->min_purchase = $request->min_purchase ?? 0;
        $cupon->usage_limit = $request->usage_limit ?? 0;
        $cupon->start_date = $request->start_date ?? NULL;
        $cupon->end_date = $request->end_date ?? NULL;
        $cupon->status = $request->status ?? 0;
        $cupon->save();
    }

    public function editCupon($id)
    {
        $data['cupon'] = Cupon::find($id);
        return $data;
    }

    public function updateCupon($request, $id)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:cupons,code,' . $id,
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'min_purchase' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'nullable|integer|in:0,1',
        ]);

        if(Cupon::where('code', $request->code)->where('id', '!=', $id)->exists()){
            throw ValidationException::withMessages([
                'error' => "Coupon code already exists."
            ]);
        }
        $cupon = Cupon::find($id);
        $cupon->code = $request->code;
        $cupon->type = $request->type;
        $cupon->value = $request->value;
        $cupon->min_purchase = $request->min_purchase ?? 0;
        $cupon->usage_limit = $request->usage_limit ?? 0;
        $cupon->start_date = $request->start_date ?? NULL;
        $cupon->end_date = $request->end_date ?? NULL;
        $cupon->status = $request->status ?? 0;
        $cupon->save();
    }

    public function deleteCupon($id)
    {
        $cupon = Cupon::find($id);
        $cupon->delete();
    }

    public function statusUpdate($id)
    {
        $cupon = Cupon::find($id);
        $cupon->status = !$cupon->status;
        $cupon->save();
    }
}
