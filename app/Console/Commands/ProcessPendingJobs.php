<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;

class ProcessPendingJobs extends Command
{
    protected $signature = 'jobs:process-if-any';
    protected $description = 'Run queue:work only if pending jobs exist';

    public function handle(): void
    {
        $count = DB::table('jobs')->count();

        if ($count > 0) {
            $this->info("🟢 Found {$count} job(s), starting worker...");
            
            // Run the worker with stop-when-empty
            $process = new Process(['php', 'artisan', 'queue:work', '--stop-when-empty']);
            $process->setTimeout(300); // Optional timeout in seconds
            $process->run(function ($type, $buffer) {
                echo $buffer;
            });

            $this->info("✅ Finished running jobs.");
        } else {
            $this->info("🔴 No pending jobs found. Worker not started.");
        }
    }
}
