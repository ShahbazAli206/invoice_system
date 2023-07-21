<?php

namespace App\Console\Commands;

use DateTime;
use DateInterval;
use Carbon\Carbon;
use App\Models\Invoice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RecurrsionInvoice extends Command
{
    protected $signature = 'recurrsion:invoice'; // Make 'id' an optional option

    protected $description = 'Command description';

    public function handle()
  {       
        Log::error("\n\nHi these im in RecurrsionInvoice ");

        $invoices = DB::table('invoices')->where('recursion', 'checked')->get();
        // Log::error("\n\nHi invoices =>  ". $invoices );



    foreach ($invoices as $invoiceData) {
        if($invoiceData->frequency == "hourly"){

        $createdAt = $invoiceData->created_at;
        $timeInterval = 60; 
        $createdAtDate = Carbon::parse($createdAt);
        $currentTime = Carbon::now();
        $timeDifference = $currentTime->diffInMinutes($createdAtDate);
       if ($timeDifference > $timeInterval) {
        // Log::error("\nthis record is 60 minutes later \n". json_encode($invoiceData) );
        $invoice = Invoice::find($invoiceData->id);

       if ($invoice) {
         $invoice->recursion = '';
         $invoice->frequency = '';
         $invoice->status_rec = '';
         $invoice->save();


//invoice number generating
         $lastRecord = Invoice::orderBy('id', 'desc')->first();
         if ($lastRecord) {
            $lastId = $lastRecord->id + 1;
         } else {
             $lastId = 1;
         }
         $idString = str_pad((string) $lastId, 4, '0', STR_PAD_LEFT);
         $stringg = 'INV-' . $idString;
     
         $dateTime1 = new DateTime($invoiceData->date);
         $dateTime2 = new DateTime($invoiceData->due_date);
     
     // Get the difference between the two dates
        $interval = $dateTime1->diff($dateTime2);
     
     // Calculate the total number of days difference
        $totalDaysDifference = $interval->days;
        $currentDate = Carbon::today();
        $formattedDate = $currentDate->format('Y-m-d');
        $mydate = new DateTime($formattedDate);
     
        $mydate->add(new DateInterval('P' . $totalDaysDifference . 'D'));
        $myDueDate = $mydate->format('Y-m-d');

    $invoice = new Invoice([
        'date' => $formattedDate,
        'due_date' => $myDueDate,
        'invoice_no' => $stringg,
        'item' => $invoiceData->item,
        'status' => 'DRAFT',
        'cust_name' => $invoiceData->cust_name,
        'amount_status' => 'UNPAID',
        'amount_due' => $invoiceData->amount_due,
        'price' => $invoiceData->price,
        'quantity' => $invoiceData->quantity,
        'template' => $invoiceData->template,
        'ttotal' => $invoiceData->ttotal,
        'recursion' =>"checked",
        'frequency' =>"hourly",
        'status_rec' =>"active",
    ]);
    $invoice->save();
    
    // Create a new Invoice model instance with the given data
         } 
         
        }
         else { Log::error("\n\nHi tit is not 60 later sorry it is fresh than it ");}
        }

        if($invoiceData->frequency == "3_min"){

            $createdAt = $invoiceData->created_at;
            $timeInterval = 3; 
            $createdAtDate = Carbon::parse($createdAt);
            $currentTime = Carbon::now();
            $timeDifference = $currentTime->diffInMinutes($createdAtDate);
           if ($timeDifference > $timeInterval) {
            $invoice = Invoice::find($invoiceData->id);
             if ($invoice) {
               $invoice->recursion = '';
               $invoice->frequency = '';
               $invoice->status_rec = '';
               $invoice->save();
             //invoice number generating
               $lastRecord = Invoice::orderBy('id', 'desc')->first();
               if ($lastRecord) {
                  $lastId = $lastRecord->id + 1;
               } else {
                   $lastId = 1;
               }
               $idString = str_pad((string) $lastId, 4, '0', STR_PAD_LEFT);
               $stringg = 'INV-' . $idString;
         
               $dateTime1 = new DateTime($invoiceData->date);
               $dateTime2 = new DateTime($invoiceData->due_date);
         
           // Get the difference between the two dates
               $interval = $dateTime1->diff($dateTime2);
         
         // Calculate the total number of days difference
               $totalDaysDifference = $interval->days;
               $currentDate = Carbon::today();
               $formattedDate = $currentDate->format('Y-m-d');
               $mydate = new DateTime($formattedDate);
               $mydate->add(new DateInterval('P' . $totalDaysDifference . 'D'));
               $myDueDate = $mydate->format('Y-m-d');
    
               $invoice = new Invoice([
            'date' => $formattedDate,
            'due_date' => $myDueDate,
            'invoice_no' => $stringg,
            'item' => $invoiceData->item,
            'status' => 'DRAFT',
            'cust_name' => $invoiceData->cust_name,
            'amount_status' => 'UNPAID',
            'amount_due' => $invoiceData->amount_due,
            'price' => $invoiceData->price,
            'quantity' => $invoiceData->quantity,
            'template' => $invoiceData->template,
            'ttotal' => $invoiceData->ttotal,
            'recursion' =>"checked",
            'frequency' =>"3_min",
            'status_rec' =>"active",
        ]);
        $invoice->save();
      }      
    }
   else { Log::error("\n\nHi tit is not 60 later sorry it is fresh than it ");}       
   }

   if($invoiceData->frequency == "daily"){

    $createdAt = $invoiceData->created_at;
    $timeInterval = 1440; 
    $createdAtDate = Carbon::parse($createdAt);
    $currentTime = Carbon::now();
    $timeDifference = $currentTime->diffInMinutes($createdAtDate);
   if ($timeDifference > $timeInterval) {
    $invoice = Invoice::find($invoiceData->id);
     if ($invoice) {
       $invoice->recursion = '';
       $invoice->frequency = '';
       $invoice->status_rec = '';
       $invoice->save();
     //invoice number generating
       $lastRecord = Invoice::orderBy('id', 'desc')->first();
       if ($lastRecord) {
          $lastId = $lastRecord->id + 1;
       } else {
           $lastId = 1;
       }
       $idString = str_pad((string) $lastId, 4, '0', STR_PAD_LEFT);
       $stringg = 'INV-' . $idString;
 
       $dateTime1 = new DateTime($invoiceData->date);
       $dateTime2 = new DateTime($invoiceData->due_date);
 
   // Get the difference between the two dates
       $interval = $dateTime1->diff($dateTime2);
 
 // Calculate the total number of days difference
       $totalDaysDifference = $interval->days;
       $currentDate = Carbon::today();
       $formattedDate = $currentDate->format('Y-m-d');
       $mydate = new DateTime($formattedDate);
       $mydate->add(new DateInterval('P' . $totalDaysDifference . 'D'));
       $myDueDate = $mydate->format('Y-m-d');

       $invoice = new Invoice([
    'date' => $formattedDate,
    'due_date' => $myDueDate,
    'invoice_no' => $stringg,
    'item' => $invoiceData->item,
    'status' => 'DRAFT',
    'cust_name' => $invoiceData->cust_name,
    'amount_status' => 'UNPAID',
    'amount_due' => $invoiceData->amount_due,
    'price' => $invoiceData->price,
    'quantity' => $invoiceData->quantity,
    'template' => $invoiceData->template,
    'ttotal' => $invoiceData->ttotal,
    'recursion' =>"checked",
    'frequency' =>"daily",
    'status_rec' =>"active",
]);
$invoice->save();
}      
}
else { Log::error("\n\nHi tit is not 60 later sorry it is fresh than it ");}       
}
if($invoiceData->frequency == "weekly"){

    $createdAt = $invoiceData->created_at;
    $timeInterval = 10080; 
    $createdAtDate = Carbon::parse($createdAt);
    $currentTime = Carbon::now();
    $timeDifference = $currentTime->diffInMinutes($createdAtDate);
   if ($timeDifference > $timeInterval) {
    $invoice = Invoice::find($invoiceData->id);
     if ($invoice) {
       $invoice->recursion = '';
       $invoice->frequency = '';
       $invoice->status_rec = '';
       $invoice->save();
     //invoice number generating
       $lastRecord = Invoice::orderBy('id', 'desc')->first();
       if ($lastRecord) {
          $lastId = $lastRecord->id + 1;
       } else {
           $lastId = 1;
       }
       $idString = str_pad((string) $lastId, 4, '0', STR_PAD_LEFT);
       $stringg = 'INV-' . $idString;
 
       $dateTime1 = new DateTime($invoiceData->date);
       $dateTime2 = new DateTime($invoiceData->due_date);
 
   // Get the difference between the two dates
       $interval = $dateTime1->diff($dateTime2);
 
 // Calculate the total number of days difference
       $totalDaysDifference = $interval->days;
       $currentDate = Carbon::today();
       $formattedDate = $currentDate->format('Y-m-d');
       $mydate = new DateTime($formattedDate);
       $mydate->add(new DateInterval('P' . $totalDaysDifference . 'D'));
       $myDueDate = $mydate->format('Y-m-d');

       $invoice = new Invoice([
    'date' => $formattedDate,
    'due_date' => $myDueDate,
    'invoice_no' => $stringg,
    'item' => $invoiceData->item,
    'status' => 'DRAFT',
    'cust_name' => $invoiceData->cust_name,
    'amount_status' => 'UNPAID',
    'amount_due' => $invoiceData->amount_due,
    'price' => $invoiceData->price,
    'quantity' => $invoiceData->quantity,
    'template' => $invoiceData->template,
    'ttotal' => $invoiceData->ttotal,
    'recursion' =>"checked",
    'frequency' =>"weekly",
    'status_rec' =>"active",
]);
$invoice->save();
}      
}
else { Log::error("\n\nHi tit is not 60 later sorry it is fresh than it ");}       
}

if($invoiceData->frequency == "monthly"){

    $createdAt = $invoiceData->created_at;
    $timeInterval = 43200; 
    $createdAtDate = Carbon::parse($createdAt);
    $currentTime = Carbon::now();
    $timeDifference = $currentTime->diffInMinutes($createdAtDate);
   if ($timeDifference > $timeInterval) {
    $invoice = Invoice::find($invoiceData->id);
     if ($invoice) {
       $invoice->recursion = '';
       $invoice->frequency = '';
       $invoice->status_rec = '';
       $invoice->save();
     //invoice number generating
       $lastRecord = Invoice::orderBy('id', 'desc')->first();
       if ($lastRecord) {
          $lastId = $lastRecord->id + 1;
       } else {
           $lastId = 1;
       }
       $idString = str_pad((string) $lastId, 4, '0', STR_PAD_LEFT);
       $stringg = 'INV-' . $idString;
 
       $dateTime1 = new DateTime($invoiceData->date);
       $dateTime2 = new DateTime($invoiceData->due_date);
 
   // Get the difference between the two dates
       $interval = $dateTime1->diff($dateTime2);
 
 // Calculate the total number of days difference
       $totalDaysDifference = $interval->days;
       $currentDate = Carbon::today();
       $formattedDate = $currentDate->format('Y-m-d');
       $mydate = new DateTime($formattedDate);
       $mydate->add(new DateInterval('P' . $totalDaysDifference . 'D'));
       $myDueDate = $mydate->format('Y-m-d');

       $invoice = new Invoice([
    'date' => $formattedDate,
    'due_date' => $myDueDate,
    'invoice_no' => $stringg,
    'item' => $invoiceData->item,
    'status' => 'DRAFT',
    'cust_name' => $invoiceData->cust_name,
    'amount_status' => 'UNPAID',
    'amount_due' => $invoiceData->amount_due,
    'price' => $invoiceData->price,
    'quantity' => $invoiceData->quantity,
    'template' => $invoiceData->template,
    'ttotal' => $invoiceData->ttotal,
    'recursion' =>"checked",
    'frequency' =>"monthly",
    'status_rec' =>"active",
]);
$invoice->save();
}      
}
else { Log::error("\n\nHi tit is not 60 later sorry it is fresh than it ");}       
}
 }
        return Command::SUCCESS;
 }
}
