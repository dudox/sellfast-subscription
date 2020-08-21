<?php

namespace App\Http\Controllers;

use App\Payments;
use App\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

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

    public function approve(){
        try {
            $payments = Payments::findOrFail(request()->id);
            $payments->status = "approved";
            $payments->save();

            $subscription = Subscription::where('customer_id',$payments->customer_id)->first();
            if(!empty($subscription)){
                $subscription->plan_id = $payments->plan_id;
                $subscription->due_on = Carbon::now()->addMonth(1);
                $subscription->subscription_status = 'active';
                $subscription->auto_renewal = 'no';
                $subscription->save();

                return redirect()->back()->with(['message'=>'Subscription has been renewed. Congratulations']);
            }

            $newSubscription = Subscription::create([
                'customer_id'=>$payments->customer_id,
                'plan_id'=>$payments->plan_id,
                'due_on'=>Carbon::now()->addMonth(1),
                'subscription_status'=>'active',
                'auto_renewal'=>'no'
            ]);

            if($newSubscription){
                return redirect()->back()->with(['message'=>'Subscription has been initiated. Congratulations']);
            }
        }
        catch(Throwable $th){
            throw $th;
        }
    }
}
