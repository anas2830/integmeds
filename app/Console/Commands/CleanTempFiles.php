<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class CleanTempFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-temp-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $directory = storage_path('app/public/temp'); // Adjust the path as necessary
        $days = 1; // Number of days to keep files
        if (File::exists($directory)) {
            $files = File::allFiles($directory);
            foreach ($files as $file) {
                if ($file->isFile() && Carbon::createFromTimestamp($file->getMTime())->diffInDays() > $days) {
                    File::delete($file);
                    $this->info("Deleted: {$file->getFilename()}");
                }
            }
        } else {
            $this->error("Directory does not exist: {$directory}");
        }
    }
}
