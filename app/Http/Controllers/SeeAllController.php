<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Category;

class SeeAllController extends Controller
{
    public function seeAll() {
        $items = Inventory::with('category')->paginate(6);
        $categories = Category::all();
        return view('client.see-all', compact('items', 'categories'));
    }
}
