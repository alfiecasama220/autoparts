<?php

namespace App\Http\Controllers;
use App\Models\Inventory;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ViewDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.view-details');
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
        $item = Inventory::findOrFail($id);
        if($item->quantity <= 0) {
            $availability = Session::get('outOfStock');
        } else {
            $availability = Session::get('available');
        }
        return view('client.view-details', compact('item', 'availability'));
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
