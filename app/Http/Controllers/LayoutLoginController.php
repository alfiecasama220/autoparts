<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;

use App\Models\Inventory;
use App\Models\User;

class LayoutLoginController extends Controller
{
    public function index() {
        return view('layout.index');
    }

    public function register() {
        return view('layout.register');
    } 

    public function dashboard() {
        $totalStock = Inventory::sum('quantity');
        return view('admin.index' , compact('totalStock'));
    } 

    public function registerPost(Request $request, UserRequest $userRequest) {
        $validator = Validator::make($request->all(), $userRequest->rules());

        if($validator->passes()) {
             $users = new User();

            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = $request->password;
            $users->role = $request->role;
            $users->save();
            
            return redirect()->intended(route('login'))->with('success', Session::get('addSuccess'));
        } else {
            return redirect()->back()->with('error');
        }
        
    }

    public function loginPost(Request $request, LoginRequest $userRequest) {
        $validator = Validator::make($request->all(), $userRequest->rules());

        if($validator->passes()) {
            $credentials = $request->only('email', 'password');
            if(Auth::attempt($credentials)) {
                session(['username'=>Auth::user()->name]);
                return redirect()->intended(route('dashboard'))->with('success', Session::get('LoginSuccess'));
            }
        } 

        return redirect()->back()->with('error', Session::get('loginError'));
    }

    public function logout() {

        
        
        Session::flush();
        return redirect()->intended(route('login'))->with('success', Session::get('LogoutSuccess'));
        Auth::logout();

        
    }
}
