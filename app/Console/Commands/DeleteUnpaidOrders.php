<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class DeleteUnpaidOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-unpaid-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete orders where payment_status is not paid';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deletedCount = Order::where('payment_status', '!=', 'paid')->where('created_at', '<=', now()->subHours(1))->delete();

        $this->info("Deleted {$deletedCount} unpaid orders.");
    }
}
