<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Payments;
use App\Plans;
use App\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;

class PaymentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    public function card(){
        $payments = Payments::with('plans','subscription','customer')->where('plan_id',2)->orderBy('id','desc')->get();
        return view('controls.payments.card.index',compact('payments'));
    }

    public function bank(){
        $payments = Payments::with('plans','subscription','customer')->where('plan_id',1)->orderBy('id','desc')->get();
        return view('controls.payments.bank.index',compact('payments'));
    }

    public function pending(){
        $payments = Payments::with('plans','subscription','customer')->where('status','pending')->orderBy('id','desc')->get();
        return view('controls.payments.pending.index',compact('payments'));
    }

    public function approve(){
        try {
            $payments = Payments::findOrFail(request()->id);
            $payments->status = "approved";
            $payments->save();

            $customer = Customers::where('id',$payments->customer_id)->first();
            $plan = Plans::where('id',$payments->plan_id)->first();
            $auto_renewal = "no";
            if($plan->id == 2){
                $auto_renewal = "yes";
            }
            $subscription = Subscription::where('customer_id',$payments->customer_id)->first();
            if(!empty($subscription)){
                $subscription->plan_id = $payments->plan_id;
                $subscription->due_on = Carbon::now()->addDays($plan->validity);
                $subscription->subscription_status = 'active';
                $subscription->auto_renewal = $auto_renewal;
                $subscription->save();
                $sms = $this->parsePost($customer->phone,"Your subscription to sellfast.ng advert for this month has been renewed. Two of your advert will be posted shortly. Thank you.");
                print($sms);
                if($sms['status'] == "OK"){
                    return redirect()->back()->with(['message'=>'Subscription has been renewed. Congratulations']);
                }
            }

            $newSubscription = Subscription::create([
                'customer_id'=>$payments->customer_id,
                'plan_id'=>$payments->plan_id,
                'due_on'=>Carbon::now()->addDays($plan->validity),
                'subscription_status'=>'active',
                'auto_renewal'=>$auto_renewal
            ]);

            if($newSubscription){
                $sms = $this->parsePost($customer->phone,"Your subscription to sellfast.ng advert for this month was successful. Two of your advert will be posted shortly. Thank you.");
                if($sms['status'] == "OK"){
                    return redirect()->back()->with(['message'=>"Subscription has been initiated. Congratulations"]);
                }
            }
        }
        catch(Throwable $th){
            throw $th;
        }
    }

    public function parsePost($phone,$message){
        return Http::asForm()->post('http://login.betasms.com.ng/api/', [
            'username'=> env('BETA_SMS_USERNAME'),
            'password'=> env('BETA_SMS_SECRET'),
            'sender'=> env('BETA_SMS_ID'),
            'mobiles' => $phone,
            'message'=>$message
        ]);
    }
}
