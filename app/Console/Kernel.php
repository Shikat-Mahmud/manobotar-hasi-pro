<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Register the Artisan commands for the application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\ReactivateBloodDoners::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        // You can add other scheduled commands here as needed
        // $schedule->command('app:reactivate-blood-doners')->daily();
        $schedule->command('app:reactivate-blood-doners')->everyMinute();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
