<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


//Stripe routes
Route::get('/checkout', [TransactionController::class, 'checkout']);
Route::get('/success', [TransactionController::class, 'success'])->name('checkout-success');
Route::get('/cancel', [TransactionController::class, 'cancel'])->name('checkout-cancel');

//Backend routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//Views
Route::get('/login', function (){
    return Inertia::render('Auth/Login');
})->name('login');

Route::get('/', function(){
    return Inertia::render('Dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/register', function (){
    return Inertia::render("Auth/Register");
})->name('register');
