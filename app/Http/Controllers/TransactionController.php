<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        $items = Inventory::all();
        return view('admin.transaction', compact('category', 'items'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $categories = Category::all();
        $category = Category::all();
        $items = Inventory::with('category')->where('category_id', $id)->paginate(20);
        return view('admin.transaction', compact('items', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::all();
        $items = Inventory::where('id', $id)->paginate(20);
        return view('admin.transaction', compact('items', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'release' => 'required',
        ]);

        $inventory = Inventory::findOrFail($id);

        $quantity = $inventory->quantity;
        $available = $quantity - $request->release;

        if($validator->passes()) {
            $inventory->release = $request->release;
            $inventory->available = $available;
            if($available == 0) {
                $inventory->quantity = $available;
            }
            $inventory->save();

            return redirect()->intended(route('showItem', $id))->with('success', 'Data edited successfully');
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
