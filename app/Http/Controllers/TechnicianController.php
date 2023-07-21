<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Color;
use App\Models\Order;
use App\Models\Category;
// use Illuminate\Notifications\Notification;
use App\Models\Services;
use App\Models\orderconfirm;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewOrderPlaced;
use App\Notifications\OrderStatusChanged;
use App\Notifications\TechOrderNotification;
use Illuminate\Support\Facades\Notification;

class TechnicianController extends Controller
{
    public function index()
    {

        return view('technician.pages.menu');
    }

    public function notifications()
    {
        $pproducts = Services::where('restaurent_id', Auth::user()->id)->with('category', 'colors')->orderBy('created_at', 'desc')->get();
        Log::error(' The storing data for menu item check is this  ==>  ' . $pproducts);
        return view('technician.pages.notifications', ['prroducts' => $pproducts]);
    }

    public function create()
    {

        return view('technician.pages.create');
    }
    public function sstore(Request $request)
    {
        //validate
        Auth::user()->id;
        Log::error(' The storing data for menu item check is this  ==>  ' .  Auth::user()->id);

        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'colors' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8048',


        ]);
        //store Image
        Log::error(' The item check 2  ');

        $image_name = 'products/' . time() . rand(0, 999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public', $image_name);


        //store
        $product = Services::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,   //* 220, for rupee to Dollars
            'description' => $request->description,
            'image' => $image_name,
            'restaurent_id' => Auth::user()->id,

        ]);
        Log::error(' The storing data is  ==>  ' . $product);

        $product->colors()->attach($request->colors);



        //return response

        return back()->with('success', 'Products Saved!');
    }

    public function edit($id)
    {
        $product = Services::findOrFail($id);
        $categories = Category::all();
        $colors = Color::all();
        return view('technician.pages.edit', ['categories' => $categories, 'colors' => $colors, 'asdf' => $product]);
    }


    public function update(Request $request, $id)
    {
        //validate
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'colors' => 'required',
            'price' => 'required',
            // 'rating' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $product = Services::findOrFail($id);
        //store Image
        $image_name = $product->image;
        if ($request->image) {
            $image_name = 'products/' . time() . rand(0, 999) . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public', $image_name);
        }
        //store
        $product->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price * 100,   //* 220,  for rupee to Dollars
            // 'rating' => $request->rating * 100,   //* 220,  for rupee to Dollars
            'description' => $request->description,
            'image' => $image_name
        ]);
        $product->colors()->sync($request->colors);
        //return response
        return back()->with('success', 'Products Updated!');
    }


    public function destroy($id)
    {
        Services::findOrFail($id)->delete();
        return back()->with('success', 'Products Deleted');
    }







    public function intro()
    {
        return view('technician.pages.introduction');
    }
    public function dashboard()
    {


        return view('technician.pages.dashboard');
    }
    public function view($id)
    {

        return view('technician.pages.view');
    }
    public function store($id, Request $request)
    {
        return back()->with('success', ' Order has been Accepted');
    }

    public function confirmed()
    {

        return view('technician.pages.confirmed');
    }
    public function updateStatus($id, Request $request)
    {


        return back()->with('success', 'Order Updated!');
    }

    public function chat()
    {
        return view('technician.pages.chat');
    }
}
