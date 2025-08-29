<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    public function index()
    {
        return view('Backend.admin.report.sales.list');
    }
    public function preview(Request $request)
    {
        $type = $request->get('type', 'running_month');
        $year = $request->get('year');
        $month = $request->get('month');

        $query = Order::with(['items.product']); // eager load product relation

        // Apply date filters
        if ($type === 'last_7_days') {
            $from = Carbon::now()->subDays(7);
            $to = Carbon::now();
            $query->whereBetween('created_at', [$from, $to]);
        } elseif ($type === 'running_month') {
            $from = Carbon::now()->startOfMonth();
            $to = Carbon::now()->endOfMonth();
            $query->whereBetween('created_at', [$from, $to]);
        } elseif ($type === 'last_month') {
            $from = Carbon::now()->subMonth()->startOfMonth();
            $to = Carbon::now()->subMonth()->endOfMonth();
            $query->whereBetween('created_at', [$from, $to]);
        } elseif ($type === 'custom' && $year && $month) {
            $from = Carbon::createFromDate($year, $month, 1)->startOfMonth();
            $to = Carbon::createFromDate($year, $month, 1)->endOfMonth();
            $query->whereBetween('created_at', [$from, $to]);
        }

        $orders = $query->get();
        // Build flat report array
        $report = [];

        foreach ($orders as $order) {
            foreach ($order->items as $detail) {
                $product = $detail->product;

                $report[] = [
                    'order_number'   => $order->order_number,       
                    'date'           => $order->created_at,         
                    'sku'            => $product->sku,              
                    'name'           => $product->product_name,     
                    'quantity'       => $detail->quantity,      
                    'sale_price'     => $product->sale_price,       
                    'total'          => $order->total_amount,      
                    'purchase_price' => $product->purchase_price,
                    'profit'         => ($product->sale_price - $product->purchase_price) * $detail->quantity,
                    'discount'       => $detail->discount ?? 0, 
                    'payment_method' => $order->payment_method,    
                ];
            }
        }

        return view('Backend.admin.report.sales.preview', compact('report', 'type', 'year', 'month'));
    }
}
