<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function home() {
        $collection = Product::orderBy('id', 'asc')->take(5)->get();
        return view('pages.home', compact('collection'));
    }

    public function login() {
        return view('pages.login');
    }

    public function do_login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        $login = Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']]);
        if($login) {
            if($user->role == 'admin') {
                return redirect()->route('dashboard');
            }
            else if($user->role == 'customer'){
                return redirect()->route('home');
            }
        }
        else {
            return redirect()->back()->withErrors([
                'message' => 'Invalid credentials'
            ]);
        }
    }

    public function do_logout() {
        Auth::logout(Auth::user());
        return redirect()->route('home');
    }

    public function register() {
        return view('pages.register');
    }

    public function do_register(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login');
    }
}
