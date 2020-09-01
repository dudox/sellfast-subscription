<?php

namespace App\Http\Traits;

use App\Payments;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait  Revenue {

    public function __init($data){
        switch($data){
            case 'today':
                return $this->today($data);
            break;
            case 'week':
                return $this->week($data);
            break;
            case 'month':
                return $this->month($data);
            break;
        }
    }

    // public function today(){
    //     return Payments::selectRaw('SUM(amount) as total, HOUR(created_at) as hour')->where('status','approved')->whereDate('created_at',Carbon::today())->groupBy('hour')->orderBy('total','asc')->get();
    // }

    function today($type){
        $payments  =  DB::table('payments')
        ->select(DB::raw('SUM(plans.amount) as total, HOUR(payments.created_at) as hour'))
        ->join('plans', 'plans.id', '=', 'payments.plan_id')
        ->whereDate('payments.created_at', '=', Carbon::now()->toDateString())
        ->groupBy('hour')
        ->where('payments.status','approved')
        ->get();

        $data = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

        foreach($payments as $key => $payment){
            $data[$payment->hour] = $payment->total;
        }
        return json_encode(['data'=>$data,'type'=>$type]);
    }

    function week($type){
        $payments  =  DB::table('payments')
        ->select(DB::raw('SUM(plans.amount) as total, WEEKDAY(payments.created_at) as day'))
        ->join('plans', 'plans.id', '=', 'payments.plan_id')
        ->whereBetween('payments.created_at',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->groupBy('day')
        ->where('payments.status','approved')
        ->get();

        $data = [0,0,0,0,0,0,0];

        foreach($payments as $key => $payment){
            $data[$payment->day] = $payment->total;
        }
        return json_encode(['data'=>$data,'type'=>$type]);
    }

    function month($type){
        $payments  =  DB::table('payments')
        ->select(DB::raw('SUM(plans.amount) as total, MONTH(payments.created_at) as month'))
        ->join('plans', 'plans.id', '=', 'payments.plan_id')
        ->whereBetween('payments.created_at',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
        ->groupBy('month')
        ->where('payments.status','approved')
        ->get();

        $data = [0,0,0,0,0,0,0,0,0,0,0,0,0];

        foreach($payments as $key => $payment){
            $data[$payment->month] = $payment->total;
        }
        return json_encode(['data'=>$data,'type'=>$type]);
    }
}
