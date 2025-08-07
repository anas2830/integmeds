<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardService
{
    public function getDashboardData()
    {
        $data['latest_orders'] = Order::latest()->with('user')->where('payment_status', 'paid')->take(5)->get();
        $data['total_orders'] = Order::where('payment_status', 'paid')->count();
        $data['pending_orders'] = Order::where('order_status', 'pending')->where('payment_status', 'paid')->count();
        $data['total_revenue'] = Order::where('payment_status', 'paid')->sum('total_amount');
        $data['total_products'] = Product::count();

        // Monthly sales data
        $monthlySales = Order::select(
            DB::raw("MONTH(created_at) as month"),
            DB::raw("SUM(total_amount) as total")
        )
        ->whereYear('created_at', Carbon::now()->year)
        ->where('payment_status', 'paid')
        ->groupBy(DB::raw("MONTH(created_at)"))
        ->orderBy(DB::raw("MONTH(created_at)"))
        ->pluck('total', 'month')
        ->toArray();

        // Initialize all 12 months with 0
        $salesByMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $salesByMonth[] = isset($monthlySales[$i]) ? (float)$monthlySales[$i] : 0;
        }

        $data['monthly_sales'] = $salesByMonth;
        return $data;
    }
}
