<?php

namespace App\Console;

use App\Console\Commands\IncomeParsCommand;
use App\Console\Commands\OrderParsCommand;
use App\Console\Commands\RunAllCommands;
use App\Console\Commands\SaleParsCommand;
use App\Console\Commands\StockParsCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $outputFilePath = storage_path('logs/command.log');
         $schedule->command(RunAllCommands::class)
            ->cron('0 */12 * * *')->withoutOverlapping()->appendOutputTo($outputFilePath);

//        $outputFilePath = storage_path('logs/command.log');
//        $schedule->command(IncomeParsCommand::class)
//            ->cron('0 */12 * * *')->withoutOverlapping()->appendOutputTo($outputFilePath);
//        $schedule->command(OrderParsCommand::class)
//            ->cron('0 */12 * * *')->withoutOverlapping()->appendOutputTo($outputFilePath);
//        $schedule->command(SaleParsCommand::class)
//            ->cron('0 */12 * * *')->withoutOverlapping()->appendOutputTo($outputFilePath);
//        $schedule->command(StockParsCommand::class)
//            ->cron('0 */12 * * *')->withoutOverlapping()->appendOutputTo($outputFilePath);

//             })->cron('*/1 * * * *')->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
