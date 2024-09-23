<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/redis', function(Request $request){
    Redis::set('name:' . 1 . ":status", 'online');
});

Route::get('/redis-get', function(Request $request){
    return Redis::get('name:1:status');
});

Route::post('/register', [UserController::class, 'store']);