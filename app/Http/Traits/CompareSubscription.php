<?php
namespace App\Http\Traits;
use App\Customers;
use App\Payments;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait CompareSubscription {

    public function compareInit($data){

        switch($data){
            case 'today':
                return $this->Ctoday($data);
            break;
            case 'week':
                return $this->Cweek($data);
            break;
            case 'month':
                return $this->Cmonth($data);
            break;
        }

    }


    function Ctoday($type){
        $payments  =  DB::table('payments')
        ->select(DB::raw('SUM(plans.amount) as total, HOUR(payments.created_at) as hour'))
        ->join('plans', 'plans.id', '=', 'payments.plan_id')
        ->whereDate('payments.created_at', '=', Carbon::now()->toDateString())
        ->groupBy('hour')
        ->get();

        $data = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

        foreach($payments as $key => $payment){
            $data[$payment->hour] = $payment->total;
        }
        return json_encode(['data'=>$data,'type'=>$type]);
    }

    function Cweek($type){
        $payments  =  DB::table('payments')
        ->select(DB::raw('SUM(plans.amount) as total, WEEKDAY(payments.created_at) as day'))
        ->join('plans', 'plans.id', '=', 'payments.plan_id')
        ->whereBetween('payments.created_at',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->groupBy('day')
        ->get();

        $data = [0,0,0,0,0,0,0];

        foreach($payments as $key => $payment){
            $data[$payment->day] = $payment->total;
        }
        return json_encode(['data'=>$data,'type'=>$type]);
    }

    function Cmonth($type){
        $active  =  DB::table('subscriptions')
        ->select(DB::raw('SUM(plans.amount) as total, MONTH(subscriptions.created_at) as month'))
        ->join('plans', 'plans.id', '=', 'subscriptions.plan_id')
        ->whereBetween('subscriptions.created_at',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
        ->where('subscription_status','active')
        ->groupBy('month')
        ->get();

        $expired  =  DB::table('subscriptions')
        ->select(DB::raw('SUM(plans.amount) as total, MONTH(subscriptions.created_at) as month'))
        ->join('plans', 'plans.id', '=', 'subscriptions.plan_id')
        ->whereBetween('subscriptions.created_at',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
        ->where('subscription_status','expired')
        ->groupBy('month')
        ->get();

        $data1 = [0,0,0,0,0,0,0,0,0,0,0,0];
        $data2 = [0,0,0,0,0,0,0,0,0,0,0,0];

        foreach($active as $key => $payment){
            $data1[$payment->month -1] = $payment->total;
        }

        foreach($expired as $key => $payment){
            $data2[$payment->month -1] = $payment->total;
        }
        return json_encode(['data1'=>$data1,'data2'=>$data2,'type'=>$type]);
    }



}
