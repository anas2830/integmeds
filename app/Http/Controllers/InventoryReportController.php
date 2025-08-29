<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryReportController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->get();

        return view('Backend.admin.report.inventory.list', compact('products'));
    }

    public function preview(Request $request)
    {
        $dateUpto = $request->date_upto ? $request->date_upto . ' 23:59:59' : now();

        $query = Product::where('status', 1);

        if ($request->product_type == 'customize' && $request->products) {
            $query->whereIn('id', $request->products);
        }

        // Eager load categories and stockLedgers
        $products = $query->with(['categories', 'stockLedgers'])->get();

        $report = $products->map(function ($product) use ($dateUpto) {
            $in = $product->stockLedgers()
                ->where('type', 'in')
                ->where('created_at', '<=', $dateUpto)
                ->sum('quantity');

            $out = $product->stockLedgers()
                ->where('type', 'out')
                ->where('created_at', '<=', $dateUpto)
                ->sum('quantity');

            $current = $product->quantity;

            $sold = OrderDetails::where('product_id', $product->id)
                ->whereHas('order', function ($q) use ($dateUpto) {
                    $q->where('created_at', '<=', $dateUpto)
                        ->where('order_status', 'completed')
                        ->where('payment_status', 'paid');
                })
                ->sum('quantity');

            $total_stock = $in - $out;

            return [
                'sku'            => $product->sku,
                'name'           => $product->product_name,
                'category'       => $product->categories->pluck('name')->join(', '),
                'purchase_price' => $product->purchase_price,
                'sale_price'     => $product->sale_price,
                'total_stock'    => $total_stock,
                'sold'           => $sold,
                'current_stock'  => $current,
                'status'         => $current > 0 ? 'In Stock' : 'Out of Stock',
            ];
        });

        return view('Backend.admin.report.inventory.preview', compact('report'));
    }
}
