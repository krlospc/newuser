<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        return view('auth.login');
    }

    public function loginPost(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        //dd(Hash::make('password'));
        $credentials = $request->only('username', 'password');
        //dd($credentials);
        if(Auth::attempt($credentials)){
            dd('yes');
        }else{
            return redirect()->intended('/');
        }
        
        return view('welcome');
    }
}
