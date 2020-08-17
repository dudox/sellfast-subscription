<?php

namespace App\Http\Controllers;

use App\Http\Traits\ActiveSubscription;
use App\Http\Traits\CompareSubscription;
use Illuminate\Http\Request;
use App\Http\Traits\Customers as Customer;
use App\Http\Traits\Revenue;
use App\Subscription;

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
        $customers = $this->customers();
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


}
