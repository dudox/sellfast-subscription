<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Throwable;
use App\Payments;
use App\Subscription;

class SubscriptionController extends Controller
{
    public function payWithFlutterwave(){
        try {
            $payments = Payments::create([
                'name'=> request()->name,
                'insta_username'=> request()->username,
                'phone_number'=> request()->phone,
                'amount'=> 500,
                'receiptID'=> '',
                'status'=>'approved'
            ]);
            if($payments){
                Subscription::create([
                    'receiptID'=>'',
                    'referenceID'=>''
                ]);
                return response()->json(['status'=>'success'],200);
            }
        }
        catch(Throwable $th){
            throw $th;
        }
    }

    public function index(){
        return view('controls.subscriptions.index');
    }

    public function active(){
        $subscriptions = Subscription::with('customer','plan')->where('subscription_status','active')->get();
        return view('controls.subscriptions.active.index',compact('subscriptions'));
    }

    public function expired(){
        $subscriptions = Subscription::with('customer','plan')->where('subscription_status','expired')->get();
        return view('controls.subscriptions.expired.index',compact('subscriptions'));
    }
}
