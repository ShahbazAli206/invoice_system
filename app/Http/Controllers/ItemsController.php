<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Notifications\CategorySuccess;

class ItemsController extends Controller
{
    //index
    public function index()
    {

        $items = Items::all();
        return view('laravel-examples/items.item', ['prroducts' => $items]);
    }
    public function create()
    {

        return view('laravel-examples/items.create');
    }

    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required|unique:items|max:255',
            'price' => 'required',
            'unit' => 'required',
            // 'description' => 'required',

        ]);
        Log::error("\n\n\nThe Items is this  ==> ");

        $product = Items::create([
            'price' => $request->price,
            'name' => $request->name,
            'unit' => $request->unit,
            // 'description' => $request->description,
        ]);

        //store


        Log::error("\n\n\nThe Items is this  ==> " . $product);





        //return response
        return back()->with('success', 'Item Saved');
    }


    public function destroy($id)
    {
        Items::findOrFail($id)->delete();
        return back()->with('success', 'Category Deleted');
    }
}
