<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Category;
use App\Models\Inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $inventoryItems = Inventory::all();
        $inventoryItems = Inventory::with('category')->get();
        return view('admin.inventory', compact('inventoryItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.addItem', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required', 
            'price' => 'required',
            'category' => 'required',
            'specification' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]); 

        if($validator->passes()) {
            $items = new Inventory();

            $path = $request->file('image')->store('images', 'public');

            $items->name = $request->name;
            $items->description = $request->description;
            $items->quantity = $request->quantity;
            $items->price = $request->price;
            $items->category_id = $request->category;
            $items->specification = $request->specification;
            $items->image = $path;
            $items->save();

            return redirect()->intended(route('inventory.index'))->with('success', Session::get('addItemSuccess'));
        } else {
            return redirect()->intended(route('inventory.index'))->with('error', Session::get('addItemError'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items = Inventory::findOrFail($id)->where('category_id', $id)->paginate(6);  
        
        $categories = Category::all();
        // $items = Inventory::paginate(6)->where('category_id', $id);  
        return view('client.see-all', compact('items', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
