<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users",   
            "password" => "required|string|confirmed",
        ]);

        $user = User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
            'role' => "user"
            ]
        );

        return response()->json([
            'user' => $user
        ]);
    }

    public function login(Request $request){
        Log::info($request->all());
        
        if(Auth::attempt($request->only('email', 'password'))){
            $request->session()->regenerate();
            Log::info("something");

            return Redirect::route('dashboard');
        }else{
            Log::info("something else");
            return Redirect::route('login');
        }

    }

    public function show(int $id){
        return User::find($id);
    }
    
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return Redirect::route('dashboard');
    }
}
