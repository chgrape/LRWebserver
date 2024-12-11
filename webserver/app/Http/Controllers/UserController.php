<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

            return to_route('dashboard');
        }

    }

    public function show(int $id){
        return User::find($id);
    }
    
    public function test(){
        return to_route('dashboard');
    }

    public function logout(){

    }
}
