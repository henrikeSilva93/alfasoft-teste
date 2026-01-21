<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage(){
        return view('auth.login');
    }

    public function loginRequest(Request $request){
        $validate = $request->validate([
            'name' => 'required|min:3',
            'password' => 'required|min:6'
        ]);

        if(auth()->attempt($validate, $request->remember)){

            return redirect()->route('contacts.list');
        }else {
            return back()->withErrors(['email' => 'Invalid credentials provided.'])->withInput();
        }
    }

    public function Register(Request $request){
        return view('auth.register');
    }

    public function RegisterRequest(Request $request){
        $validate = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = \App\Models\User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        auth()->login($user);
        session()->flash('success', 'Registration successful.');
        return redirect()->route('contacts.list');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('contacts.list');
    }
}
