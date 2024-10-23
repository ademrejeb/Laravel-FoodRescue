<?php

namespace App\Console;

use App\Mail\ContratExpirationReminder;
use App\Models\Contrat;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('rapports:generate daily')->daily();
        $schedule->command('rapports:generate weekly')->weekly();
        $schedule->command('rapports:generate monthly')->monthly();
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $contrats = Contrat::where('date_fin', '<=', now()->addDays(30))->get();
            foreach ($contrats as $contrat) {
                Mail::to($contrat->user->email)->send(new ContratExpirationReminder($contrat));
            }
        })->daily();
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
