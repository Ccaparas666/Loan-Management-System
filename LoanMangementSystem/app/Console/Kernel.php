<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
{
    $schedule->command('generate:pay')->dailyAt('22:04');
    // $schedule->command('generate:pay')->everyMinute();
}

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    protected $routeMiddleware = [
        // other middleware...
        'is_admin' => AdminMiddleware::class,
      
        'user-role' => \App\Http\Middleware\AdminMiddleware::class,
    ];

    
}
