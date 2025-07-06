<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ClearLogs extends Command
{
    protected $signature = 'logs:clear';
    protected $description = 'Clear all Laravel log files';

    public function handle(): void
    {
        $logPath = storage_path('logs');

        foreach (File::files($logPath) as $file) {
            File::put($file->getRealPath(), ''); // clear each log file
        }

        $this->info('✅ Laravel logs cleared.');
    }
}
