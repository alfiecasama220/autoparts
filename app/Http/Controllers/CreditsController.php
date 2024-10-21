<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use App\Models\Credits;

class CreditsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Items = Credits::all();
        return view('admin.credits', compact('Items'));
    }

    public function searchCredits(Request $request) {
        $validator = Validator::make($request->all(), [
            'search' => 'required',
        ]);

        if($validator->passes()) {
            $search = $request->search;
            $Items = Credits::where('name', 'LIKE', '%' . $search . '%')->paginate(20);
            return view('admin.credits', compact('Items'));
        } 
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.addCredits');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
        ]);

        if($validator->passes()) {
            $credits = new Credits();

            $uuid = (string) Str::uuid();

            $credits->uuid = $uuid;
            $credits->name = $request->name;
            $credits->contact = $request->contact;
            $credits->address = $request->address;
            $credits->save();

            return redirect()->intended(route('credits.index'))->with('success', Session::get('successUserAdd'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Items = Credits::where('id', $id)->get();
        return view('admin.next', compact('Items'));
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
