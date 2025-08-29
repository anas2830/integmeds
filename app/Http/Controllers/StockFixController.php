<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OrderDetails;
use App\Models\StockLeadger;
use Illuminate\Support\Facades\DB;

class StockFixController extends Controller
{
    public function fix()
    {
        DB::beginTransaction();

        try {
            // Clear all stock ledgers
            StockLeadger::truncate();

            // Rebuild stock ledgers
            $products = Product::where('status', 1)->get();
            // dd($products);

            foreach ($products as $product) {
                // Total sold quantity (only paid orders)
                $soldQty = OrderDetails::where('product_id', $product->id)
                    ->whereHas('order', function ($q) {
                        $q->where('payment_status', 'paid');
                    })
                    ->sum('quantity');

                // Initial stock = current stock + sold
                $initialStock = $product->quantity + $soldQty;

                // Insert IN ledger
                StockLeadger::create([
                    'product_id' => $product->id,
                    'quantity'   => $initialStock,
                    'type'       => 'in',
                    'note'       => "Initial stock added {$initialStock} by admin",
                ]);

                // Insert OUT ledger (aggregated sold)
                if ($soldQty > 0) {
                    StockLeadger::create([
                        'product_id' => $product->id,
                        'quantity'   => $soldQty,
                        'type'       => 'out',
                        'note'       => "Quantity decreased by customer purchase: - {$soldQty}",
                    ]);
                }
            }

            DB::commit();

            return response()->json(['message' => 'Stock ledgers fixed successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
