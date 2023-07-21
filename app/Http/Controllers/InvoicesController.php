<?php

namespace App\Http\Controllers;

// use pdf;
use App\Models\User;
use App\Models\Items;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;



class InvoicesController extends Controller
{
    
    //index
    public function index()
    {
      
    $customVariable = Session::get('recursion');

if ($customVariable == 'Sent') {
    $item = DB::table('invoices')->where("status", "SENT")->get()->toArray();

} elseif ($customVariable == 'Unpaid') {
    $item = DB::table('invoices')->where("amount_status", "UNPAID")->get()->toArray();

} elseif ($customVariable == 'Draft') {
    $item = DB::table('invoices')->where('status', 'DRAFT')->get()->toArray();

} else {
    $item = DB::table('invoices')->get()->toArray();

}

return view('laravel-examples/Invoices.Invoices', ['prroducts' => $item]);


    }


    public function update(Request $request)
    {
        Session::put('recursion', $request->status);
        $response = new Response();
        $response->withCookie(cookie('reload_page', 'true'));
        
        return $response;    }



    
    public function create()
    {
        $users = User::where('role', 2)->get();
        $items = Items::all();
        $lastRecord = Invoice::orderBy('id', 'desc')->first();
        if ($lastRecord) {
            $lastId = $lastRecord->id + 1;
        } else {
            $lastId = 1;
        }
        $idString = str_pad((string) $lastId, 4, '0', STR_PAD_LEFT);
        $string = 'INV-' . $idString;
        return view('laravel-examples/Invoices.create', ['customers' => $users, 'Items' => $items, 'estno' => $string]);
    }







    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'estimate_date' => 'required',
            'estimate_no' => 'required',
            'estimate_date' => 'required',
            'expiray_date' => 'required',
            'item' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'amount' => 'required',
            'notes' => 'required',
            'subtotal' => 'required',
            'totalamount' => 'required',
            // 'discount' => 'required',
            'template' => 'required',
        ]);
        Log::error("\n\n\nThe recurrence_value is this  ==> " .   $request->recurrence_value);
        $receivedNumber = $request->input('totalamount'); // Replace 'number' with your actual input field name

    
        
        $formattedNumber = number_format((float) $receivedNumber, 2, '.', '');
        $Invoice = Invoice::create([
            'date' => $request->estimate_date,
            'due_date' => $request->expiray_date,
            'recursion' => $request->recurrence_value,
            'status_rec' => $request->recurrence_status,
            'frequency' => $request->recurrence_frequency,
            'invoice_no' => $request->estimate_no,
            'customer_name' => $request->customer_name,
            'item' => $request->item,
            'status' => 'DRAFT',
            'cust_name' => $request->customer_name,
            'amount_status' => 'UNPAID',
            'amount_due' => $request->totalamount,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'template' => $request->template,
            'ttotal' => $formattedNumber,
        ]);
        
        Log::error("\n\nHi im in controller  file and \nThe frequency is this session ==> " .   $Invoice->frequency . '\n and status_rec is this session => '. $Invoice->status_rec );
        return $this->form($Invoice->id);
    }


    public function updateStatus($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);
    if ($invoice) {
        $invoice->status = 'SENT';
        $invoice->save();
        return redirect()->back()->with('success', 'Status updated successfully');
    } else {
        return redirect()->back()->with('error', 'Invoice not found');
    }
    }


    public function download($id)
    {
       
        $invoice = Invoice::find($id);

        if ($invoice->template == 'template-1')
        {
            $pdf = Pdf::loadView('laravel-examples/Invoices.template_1',  [  'item' => $invoice]);

            return $pdf->stream();


        }
        elseif ($invoice->template == 'template-2')
        {

            $pdf = Pdf::loadView('laravel-examples/Invoices.template_2',  [  'item' => $invoice]);

        return $pdf->stream();
        }
        else
        {

            $pdf = Pdf::loadView('laravel-examples/Invoices.template_3',  [  'item' => $invoice]);

            return $pdf->stream();
        
        }
      
    }
    //preivew

    public function form($id)
    {
        $invoice = Invoice::find($id);

        if ($invoice->template == 'template-1')
        {

            return view('laravel-examples/Invoices.form1', ['item' => $invoice]);
        }
        elseif ($invoice->template == 'template-2')
        {

            return view('laravel-examples/Invoices.form2', ['item' => $invoice]);
        }
        else
        {

            return view('laravel-examples/Invoices.form3', ['item' => $invoice]);
        }
        
    }
}
