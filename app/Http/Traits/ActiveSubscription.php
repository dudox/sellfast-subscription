<?php

namespace App\Http\Traits;

use App\Payments;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait  ActiveSubscription {
    public function aSub(){
        $payments  =  DB::table('customers')
        ->select(DB::raw('COUNT(*) as total, MONTH(created_at) as month'))
        ->whereBetween('created_at',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
        ->groupBy('month')
        ->get();

        $data = [0,0,0,0,0,0,0,0,0,0,0,0];

        foreach($payments as $key => $payment){
            $data[$payment->month -1] = $payment->total;
        }
        return json_encode($data);
    }

    public function progress(){
        $pCard = 0;
        $card = Payments::where('status','approved')->where('plan_id', 2)->get()->count();
        $bank = Payments::where('status','approved')->where('plan_id', 1)->get()->count();

        $total = $card + $bank;

        if($total != 0){
            $pCard = ($card * 100) / $total;
        }

        return round($pCard,1);
    }
}
