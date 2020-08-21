<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Http\Traits\ActiveSubscription;
use App\Http\Traits\CompareSubscription;
use Illuminate\Http\Request;
use App\Http\Traits\Customers as Customer;
use App\Http\Traits\Revenue;
use App\Payments;
use App\Subscription;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    use Customer;
    use Revenue;
    use ActiveSubscription;
    use CompareSubscription;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = $this->customers();
        $progress = $this->progress();
        return view('controls.dashboard.index',compact('customers','progress'));
    }

    public function revenue(){
        $revenue = $this->__init(request()->date);
        return $revenue;
    }

    public function active_subscription(){
        $active = $this->aSub();
        return $active;
    }

    public function plan_progress(){
        $active = $this->progress();
        return $active;
    }

    public function customersInfo(){
        $customers = Customers::with('subscription.plan')->orderBy('id','asc')->get();
        $progress = $this->progress();
        $subscription = $this->subscription();
        return view('controls.customers.index',compact('customers','progress','subscription'));
    }
    public function subscription(){
        return Subscription::where('subscription_status','active')->get();
    }

    public function compare_subscription(){
        return $this->compareInit(request()->date);
    }

    public function handles(){
        $customers = Customers::with('subscription.plan')->orderBy('id','asc')->get();
        return view('controls.customers.handles.index',compact('customers'));
    }

    public function phones(){
        $customers = Customers::with('subscription.plan')->orderBy('id','asc')->get();
        return view('controls.customers.phones.index',compact('customers'));
    }

    public function search(Request $request){
        $id = $request->data;
        $customer = Customers::where('username',$id)->first();
        if(!empty($customer)){
            return view('controls.results.handles',compact('customer'));
        }
        $payment = Payments::with('customer','plans')->where('token',$id)->first();
        if(!empty($payment)){
            return view('controls.results.payments',compact('payment'));
        }
        return view('controls.results.notFound');
    }

    public function password(){
        return view('controls.security.index');
    }

    public function passsave(){
        $id = Auth::user()->id;
        $user = User::find($id);
        if(Hash::check(request()->old, $user->password)){
            if(request()->new == request()->confirm){
                $password = Hash::make(request()->new);
                $user->password = $password;
                if($user->save()){
                    return redirect()->back()->with(['message'=>'Password has been updated successfully','status'=>'saved']);
                }
            } else {
                return redirect()->back()->withErrors(['message'=>'Your new password does not match confirm field','status'=>'match']);
            }
        } else {
            return redirect()->back()->withErrors(['message'=>'Your old password is incorrect','status'=>'incorrect']);
        }
    }

    public function logout(){
         Auth::logout();
         return redirect()->route('login');
    }


}
