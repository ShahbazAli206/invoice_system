<?php
namespace App\Console\Commands;
use Illuminate\Support\Facades\Log;

use Illuminate\Console\Command;

class StartImports extends Command
{
    protected $signature = 'command:start-imports {--data=}';
    protected $description = 'Command description';

    public function handle()
    {
        Log::info("\n\nReceived data in StartImports **********************: ");

        $serializedData = $this->option('data');
        $data = json_decode($serializedData, true);

        Log::info("\n\nReceived data in StartImports: " . json_encode($data) . "\n\n");

        
        
        // Rest of the command handling logic...
    }
}
