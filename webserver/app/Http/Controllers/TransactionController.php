<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class TransactionController extends Controller
{
    public function index(){
        return view('index');
    }

    public function checkout(Request $request){
        $stripePriceId = 'price_1QUSzTGGsQM8WqoyDAd5vbHk';

        $quantity = 1;

        return $request->user()->checkout([$stripePriceId => $quantity], [
            'success_url' => route('checkout-success'),
            'cancel_url' => route('checkout-cancel')
        ]);
    }

    public function success(){
        return view('success');
    }

    public function cancel(){
        return view('cancel');
    }
}
