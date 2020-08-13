<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Throwable;
use App\Payments;

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

            }
        }
        catch(Throwable $th){
            throw $th;
        }
    }
}
