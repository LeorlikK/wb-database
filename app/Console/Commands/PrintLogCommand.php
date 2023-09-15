<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PrintLogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pars:log {--clear}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Print parsing logs ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $logFilePath = storage_path('logs/command.log');

        if ($this->option('clear')) {
            if (File::exists($logFilePath)) {
                File::put($logFilePath, '');
                $this->info('cleared: command.log');
            } else {
                $this->info('cleared: command.log');
                $this->info("not exist: command.log");
            }
        } else {
            $logFilePath = storage_path('logs/command.log');
            $logContent = file_get_contents($logFilePath);

            $this->info("Contents of command.log:\n\n" . $logContent);
        }
    }
}
