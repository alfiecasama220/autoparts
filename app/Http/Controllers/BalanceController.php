<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Credits;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $balanceItems = Credits::orderBy('created_at', 'desc')->get();
        $totalBalance = Balance::where('status', 1)->sum('balance');
        $CreditBalance = Credits::where('status', 0)->sum('borrowed');
        return view('admin.balance', compact('balanceItems', 'totalBalance', 'CreditBalance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Balance::all();
        return view('admin.addBalance', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'balance' => 'required',
            'description' => 'required',    
        ]);

        if($validator->passes()) {
            $balance = new Balance();
            $uuid = (string) Str::uuid();

            $balance->balance = $request->balance;
            $balance->description = $request->description;
            $balance->clientUUID = $uuid;
            $balance->status = 1;
            $balance->save();

            return redirect()->intended(route('balance.index'))->with('success', Session::get('addBalanceSuccess'));
        } else {
            return redirect()->back()->with('error', 'Failed! Not Successful');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        

        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'description' => 'required',
        ]); 

        if($validator->passes()) {
            
            $credits = Credits::where('uuid', $id)->firstOrFail();
            $balance = Balance::where('clientUUID', $id)->firstOrFail();

            if($credits) {
                $credits->paid += $request->amount;
                $credits->borrowed -= $request->amount;
                $credits->status = 0;
                $credits->save();

                if($balance) {

                $balance->balance += $request->amount;
                $balance->description = $request->description;
                $balance->status = 1;
                $balance->save(); 

                    return redirect()->back()->with('success', Session::get('addPaymentSuccess'));
                }

                
            }
            
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
