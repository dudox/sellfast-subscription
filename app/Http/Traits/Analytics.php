<?php
namespace App\Http\Traits;
use App\Customers;
use App\Payments;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait Analytics {

    public $total;


    public function total_users() {
       return Customers::with('subscription')->orderBy('id','asc')->get();
    }

    public function users_growth(){
        $res = null;
        $subDay = Customers::whereDate('created_at',Carbon::yesterday())->get()->count();
        $toDay = Customers::whereDate('created_at',Carbon::today())->get()->count();
        $total = $subDay + $toDay;
        if($total != 0){
            $pSubDay = ($subDay * 100) / $total;
            $pToDay = ($toDay * 100 ) / $total;

            $growth = $pToDay - $pSubDay;

            if($growth < 0){
                $res =
                    '<p class="text-danger">
                        <span>'.round($growth,2).'%</span>
                        <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                    </p>'
                ;
            } else {
                $res = '<p class="text-success">
                            <span>'.round($growth,2).'%</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                        </p>';
            }

        }
        return $res;
    }

    public function payments(){
        return DB::table('payments')
        ->selectRaw(' plans.name as planName, plans.amount as total, payments.token, payments.status, payments.updated_at, customers.name, customers.username')
        ->join('plans','plans.id','payments.plan_id')
        ->join('customers','customers.id','payments.customer_id')
        ->orderBy('payments.id','asc')

        ->where('payments.status','approved')->get();
    }

    public function payments_growth(){
        $res = 0;
        $yesterday = DB::table('payments')
        ->join('plans','plans.id','payments.plan_id')
        ->select(DB::raw('SUM(plans.amount) as total'))
        ->where('status','approved')
        ->whereDate('payments.created_at',Carbon::yesterday())->get()[0]->total;
        $today = DB::table('payments')
        ->join('plans','plans.id','payments.plan_id')
        ->select(DB::raw('SUM(plans.amount) as total, plans.name, plans.amount'))

        ->where('status','approved')
        ->whereDate('payments.created_at',Carbon::today())->get()[0]->total;
        $total = $yesterday + $today;
       if($total != 0){
                // pecentage payments
            $pY = ($yesterday * 100) / $total;
            $pT = ($today * 100 ) / $total;

            $growth = $pT - $pY;
            if($growth < 0 ) {
                $res = '
                <p class="text-danger">
                    <span>'.round($growth,2).'%</span>
                    <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                </p>
                ';
            }
            else {
                $res = '
                <p class="text-success">
                    <span>'.round($growth,2).'%</span>
                    <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                </p>
                ';
            }
       }

        return $res;
    }
}
