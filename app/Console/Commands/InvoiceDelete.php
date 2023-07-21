<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InvoiceDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'InvoiceDelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $interval = 60; // Time interval in minutes
        $deleteTime = Carbon::now()->subMinutes($interval);

        // Delete files older than the specified time interval
        DB::table('invoices')->where('created_at', '<=', $deleteTime)->delete();


        return Command::SUCCESS;
    }
}
