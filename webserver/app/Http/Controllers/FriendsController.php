<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $user_id)
    {
        return User::find($user_id)->friends;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $user_id, int $friend_id)
    {
        User::find($user_id)->friends()->attach($friend_id);
        return response("OK");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
