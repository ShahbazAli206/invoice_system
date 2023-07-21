<?php

namespace App\Console;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Console\Commands\InvoiceDelete; 
use App\Console\Commands\StartImports;

use App\Console\Commands\RecurrsionInvoice; 
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('InvoiceDelete')->everyMinute();
        
        $count = DB::table('invoices')->where('recursion', 'checked')->where('status_rec', 'active')->count();

        if ($count) {
            $schedule->command(RecurrsionInvoice::class)->everyMinute();
        }
           else {
            Log::error("\n\nHi im in Command Kernal else file ");

           }
    }

    protected function commands()
{
    $this->load(__DIR__.'/Commands'); // Load your existing commands directory

    // Add your existing command classes to be registered
    $this->app->singleton('command.invoice-delete', function ($app) {
        return new InvoiceDelete();
    });
    $this->app->singleton('command.invoice-delete', function ($app) {
        return new RecurrsionInvoice();
    });
    $this->app->singleton('command:start-imports', function ($app) {
        return new RecurrsionInvoice();
    });

    
}


    // protected function commands()
    // {
    //     $this->load(__DIR__.'/Commands'); // Load your existing commands
    
    //     // Register your custom command
    //     $this->app->singleton('command.your-custom-command', function ($app) {
    //         return new YourCommand();
    //     });
    // }
   

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    // protected function commands()
    // {
    //     $this->load(__DIR__.'/Commands');

    //     require base_path('routes/console.php');
    // }
}
