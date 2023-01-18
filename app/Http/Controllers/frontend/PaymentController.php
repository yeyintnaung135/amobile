<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment()
    {
        return view('frontend.payment.payment');
    }
    
    public function review()
    {
      return view('frontend.payment.review');
    }
}
