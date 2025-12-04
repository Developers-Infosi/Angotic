<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];


    protected function schedule(\Illuminate\Console\Scheduling\Schedule $schedule)
    {
        $alertDays = [25, 20, 15, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0];

        foreach ($alertDays as $days) {
            $schedule->job(new \App\Jobs\EventCountdownAlert($days))
                ->dailyAt('08:00'); // Ajuste a hora que deseja enviar
        }
    }
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
