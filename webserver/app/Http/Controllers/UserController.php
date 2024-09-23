<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users",   
            "password" => "required|string|confirmed",
            "role" => "required|string"
        ]);

        $user = User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => bcrypt($validate['password']),
            'role' => $validate['role']
            ]
        );

        $tkn = $user->createToken('LaravelPassportAuth')->accessToken;

        return response()->json(['token' => $tkn],200);
    }

    public function show(int $id){
        return User::find($id);
    }
}
