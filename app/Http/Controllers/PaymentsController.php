<?php

namespace App\Http\Controllers;

use App\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function card(){
        $payments = Payments::with('plans','subscription','customer')->where('plan_id',2)->get();
        return view('controls.payments.card.index',compact('payments'));
    }

    public function bank(){
        $payments = Payments::with('plans','subscription','customer')->where('plan_id',1)->get();
        return view('controls.payments.bank.index',compact('payments'));
    }

    public function pending(){
        $payments = Payments::with('plans','subscription','customer')->where('status','pending')->get();
        return view('controls.payments.pending.index',compact('payments'));
    }
}
