<?php


namespace App\Services\Web;

use App\Models\Product;


class ProductCartService
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


    private function getRequestedQuantitiesAndStockIssues($request, $cart)
    {
        // Build a map of [rowId => requestedQty]
        $requestedQuantities = [];
        foreach ($request->rowId as $index => $rowId) {
            $requestedQuantities[$rowId] = $request->qty[$index];
        }

        // Pass cart and requested quantities for validation
        $stockIssues = $this->productCartStockCheck($cart, $requestedQuantities);

        // Extract failed row IDs and messages from stock issues
        $failedRowIds = array_column($stockIssues, 'rowId');
        $messages = array_column($stockIssues, 'message');

        return [
            'requestedQuantities' => $requestedQuantities,
            'failedRowIds' => $failedRowIds,
            'messages' => $messages,
        ];
    }
}