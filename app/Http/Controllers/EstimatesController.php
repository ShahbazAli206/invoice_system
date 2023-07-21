<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Items;
use App\Models\Estimate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Notifications\CategorySuccess;

class EstimatesController extends Controller
{
    //index
    public function index()
    {

        $item = Estimate::all();
        Log::error("\n\n\nThe item  ==> " . $item);

        return view('laravel-examples/estimates.estimate', ['prroducts' => $item]);
    }
    public function create()
    {

        $users = User::where('role', 2)->get();
        // Log::error(' The customers are   ==>  ' . $users);

        $items = Items::all();
        // Log::error(' The items are   ==>  ' . $items);

        $lastRecord = Estimate::orderBy('id', 'desc')->first();

        if ($lastRecord) {
            $lastId = $lastRecord->id + 1;
            // Log::error(' The lastId    ==>  ' . $lastId);
        } else {
            $lastId = 1;
            // Log::error(' The lastId    ==>  ' . $lastId);
        }
        $idString = str_pad((string) $lastId, 4, '0', STR_PAD_LEFT);
        $string = 'EST-' . $idString;

        return view('laravel-examples/estimates.create', ['customers' => $users, 'Items' => $items, 'estno' => $string]);
        // Log::error("\n\n\nThe Items is this  ==> ");
        return back()->with('success', 'Item Saved');
    }
    public function store(Request $request)
    {
        Log::error("\n\n\nThe startas *****************  the data done  ==> " . $request->customer_name);
        Log::error("\n\n\nThe startas *****************  the data done  ==> " . $request->estimate_date);
        Log::error("\n\n\nThe startas *****************  the data done  ==> " . $request->estimate_no);
        Log::error("\n\n\nThe startas *****************  the data done  ==> " . $request->estimate_date);
        Log::error("\n\n\nThe startas *****************  the data done  ==> " . $request->expiray_date);
        Log::error("\n\n\nThe startas *****************  the data done  ==> " . $request->item);
        Log::error("\n\n\nThe startas *****************  the data done  ==> " . $request->price);
        Log::error("\n\n\nThe startas *****************  the data done  ==> " . $request->amount);
        Log::error("\n\n\nThe startas *****************  the data done  ==> " . $request->notes);
        Log::error("\n\n\nThe startas *****************  the data done  ==> " . $request->template);
        Log::error("\n\n\nThe totalamount *****************  the data done  ==> " . $request->totalamount);

        //validate
        $request->validate([
            'customer_name' => 'required',
            'estimate_date' => 'required',
            'estimate_no' => 'required',
            'estimate_date' => 'required',
            'expiray_date' => 'required',
            'item' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'notes' => 'required',
            'subtotal' => 'required',
            'totalamount' => 'required',
            // 'discount' => 'required',
            'template' => 'required',
            // 'description' => 'required',

        ]);
        Log::error("\n\n\nThe validate the data done  ==> ");


        $Estimate = Estimate::create([
            'date' => $request->estimate_date,
            'estimate_no' => $request->estimate_no,
            'customer_name' => $request->customer_name,
            'status' => 'DRAFT',
            'total' => $request->totalamount,
            // 'description' => $request->description,
        ]);

        //store


        Log::error("\n\n\nThe Estimate created is this  ==> " . $Estimate);
        //return response
        return back()->with('success', 'Item Saved');
    }


    public function destroy($id)
    {
        Items::findOrFail($id)->delete();
        return back()->with('success', 'Category Deleted');
    }
}
