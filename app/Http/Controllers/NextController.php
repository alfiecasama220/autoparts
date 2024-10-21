<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Credits;
use App\Models\Balance;

class NextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Items = Credits::where('uuid', $id)->get();
        $Balance = Balance::where('clientUUID', $id)->where('status', 0)->get();
        return view('admin.next', compact('Items', 'Balance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $balance = Balance::all()->sum('balance');
        
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'description' => 'required',
        ]);

        if($validator->passes()) {
            $credit = Credits::where('uuid', $id)->firstOrFail();
            $balance = new Balance();
            if($credit) {

                if($credit->creditStatus == 0) {
                    $balance->description = $request->description;
                    // $balance->balance = $request->amount;
                    $balance->clientUUID = $id;
                    $balance->status = 0;
                    $balance->save();
                    
                    $credit->borrowed += $request->amount;
                    $credit->creditStatus = true;
                    // $credit->status = 0;
                    $credit->save();
                } else {
                    $balances = Balance::where('clientUUID', $id)->firstOrFail();
                    
                    if($balances) {
                        $credit->borrowed += $request->amount;
                        $credit->save();

                        $balance->description = $request->description;
                        // $balances->balance += $request->amount;
                        $balances->save();
                    }                   
                }
                
            }
            return redirect()->back()->with('success', Session::get('addCreditSuccess'));
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
