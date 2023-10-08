<?php

namespace App\Console;

use App\Jobs\StocksDataScrapperJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // We schedule the price scrapper every minute for new updates
        // For bigger data and execution this could be in separate queue with
        // long execution
        $schedule->job(StocksDataScrapperJob::class)->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
