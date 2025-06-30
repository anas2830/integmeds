<?php


namespace App\Services\Web;

use App\Models\Product;


class ProductService
{
    public function productCartStockCheck($cart, $requestedQuantities)
    {
        $outOfStockItems = [];

        // Get all product IDs
        $productIds = $cart->pluck('attributes.product_id')->unique();
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        foreach ($cart as $item) {
            $productId = $item->attributes->product_id;
            $product = $products[$productId] ?? null;

            if (!$product) continue;

            $rowId = $item->id;
            $requestedQty = $requestedQuantities[$rowId] ?? $item->quantity;

            if ($product->quantity === 0) {
                $outOfStockItems[] = [
                    'rowId' => $rowId,
                    'message' => "Product '{$product->name}' is out of stock.",
                ];
            } elseif ($requestedQty > $product->quantity) {
                $outOfStockItems[] = [
                    'rowId' => $rowId,
                    'message' => "Only {$product->quantity} units of '{$product->name}' available.",
                ];
            }
        }

        return $outOfStockItems;
    }
}