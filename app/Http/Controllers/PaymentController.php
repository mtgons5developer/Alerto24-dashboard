<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = [[], []];
        return view('admin.payment_list',compact('payments'));
    }
}
