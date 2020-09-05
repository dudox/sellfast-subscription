<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;
use Throwable;
use App\Payments;
use App\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class SubscriptionController extends Controller
{
    public function payWithFlutterwave(){
        try {

            $customer = Customers::where('username',request()->username)->first();
            if(!$customer){
                $customer = Customers::create([
                    'username'=> request()->username,
                    'name'=>request()->name,
                    'phone'=> request()->phone
                ]);
            }
            $token = $this->get_rand_alphanumeric(8);
            $payments = Payments::create([
                'customer_id'=> $customer->id,
                'plan_id'=> request()->plan_id,
                'token'=>$token,
            ]);
            return response()->json(['status'=>'success','plan_id'=>$payments->plan_id,'customer_id'=>$customer->id,'name'=>$customer->name,'phone'=>$customer->phone,'token'=>$payments->token,'payment_id'=>$payments->id],200);
        }







        catch(Throwable $th){
            throw $th;
        }
    }

    public function index(){
        return view('controls.subscriptions.index');
    }

    public function active(){
        $subscriptions = Subscription::with('customer','plan')->where('subscription_status','active')->orderById('desc')->get();
        return view('controls.subscriptions.active.index',compact('subscriptions'));
    }

    public function expired(){
        $subscriptions = Subscription::with('customer','plan')->where('subscription_status','expired')->orderById('desc')->get();
        return view('controls.subscriptions.expired.index',compact('subscriptions'));
    }

    public function assign_rand_value($num) {

        // accepts 1 - 36
        switch($num) {
            case "1"  : $rand_value = "a"; break;
            case "2"  : $rand_value = "b"; break;
            case "3"  : $rand_value = "c"; break;
            case "4"  : $rand_value = "d"; break;
            case "5"  : $rand_value = "e"; break;
            case "6"  : $rand_value = "f"; break;
            case "7"  : $rand_value = "g"; break;
            case "8"  : $rand_value = "h"; break;
            case "9"  : $rand_value = "i"; break;
            case "10" : $rand_value = "j"; break;
            case "11" : $rand_value = "k"; break;
            case "12" : $rand_value = "l"; break;
            case "13" : $rand_value = "m"; break;
            case "14" : $rand_value = "n"; break;
            case "15" : $rand_value = "o"; break;
            case "16" : $rand_value = "p"; break;
            case "17" : $rand_value = "q"; break;
            case "18" : $rand_value = "r"; break;
            case "19" : $rand_value = "s"; break;
            case "20" : $rand_value = "t"; break;
            case "21" : $rand_value = "u"; break;
            case "22" : $rand_value = "v"; break;
            case "23" : $rand_value = "w"; break;
            case "24" : $rand_value = "x"; break;
            case "25" : $rand_value = "y"; break;
            case "26" : $rand_value = "z"; break;
            case "27" : $rand_value = "0"; break;
            case "28" : $rand_value = "1"; break;
            case "29" : $rand_value = "2"; break;
            case "30" : $rand_value = "3"; break;
            case "31" : $rand_value = "4"; break;
            case "32" : $rand_value = "5"; break;
            case "33" : $rand_value = "6"; break;
            case "34" : $rand_value = "7"; break;
            case "35" : $rand_value = "8"; break;
            case "36" : $rand_value = "9"; break;
        }
        return $rand_value;
    }

    public function get_rand_alphanumeric($length) {
        if ($length>0) {
            $rand_id="";
            for ($i=1; $i<=$length; $i++) {
                mt_srand((double)microtime() * 1000000);
                $num = mt_rand(1,36);
                $rand_id .= $this->assign_rand_value($num);
            }
        }
        return strtoupper($rand_id);
    }

    function validatePayment(){
        try {
            $payment = Payments::find(request()->payment_id);
            $payment->status = 'approved';
            $payment->save();

            $subscription = Subscription::where('customer_id',request()->customer_id)->first();
            if(empty($subscription)){
                Subscription::create([
                    'customer_id'=>request()->customer_id,
                    'plan_id'=>request()->plan_id,
                    'due_on'=>Carbon::now()->addDays(30),
                    'subscription_status'=>'active',
                    'auto_renewal'=>'yes'
                ]);
            } else {
                $subscription->plan_id = request()->plan_id;
                $subscription->due_on = Carbon::now()->addMonth();
                $subscription->subscription_status = 'active';
                $subscription->auto_renewal = 'yes';
                $subscription->save();
            }
            $this->parsePost(request()->phone,"Your subscription to sellfast.ng advert for this month was successful. Two of your advert will be posted shortly. Thank you.");
            return  response()->json(['status'=>'success'], 200);


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

    public function successPage($receipt){
        return  '
        <div class=" vh-100">

            <div class="d-flex align-items-center vh-100">
                <a href="'.route("plans").'" class="border shadow-sm py-1 px-4 m-0 " style="border-radius: 5px; position: absolute; top: 5px; left:5px">
                    <span data-feather="arrow-left-circle"></span> Close
                </a>
                <div class="mx-auto px-3">
                    <img  src="'.asset("img/logo.png").'" class="center mb-3" style="width:50px" />
                    <h3 class="tempColor mt-3" style="font-weight: 900; font-size: 28px">Payment Successful!</h3>
                    <p class="text-muted">Your payment approval code is <b class="badge badge-dark h2" style="font-size:20px">'.$receipt.'</b></p>
                    <hr />
                    <p class="font-weight-bold text-muted">Please click on the WhatsApp Link below to send us your code for confirmation.</p>
                    <a href="https://wa.me/2348127584647?text=This%20is%20my%20payment%20code%20'.$receipt.'.%20Kindly%20confirm%20payment." class="btn btn-success btn-block">WhatsApp <i class="fa fa-whatsapp"></i></a>



                </div>
            </div>
        </div>
        ';
    }
}
