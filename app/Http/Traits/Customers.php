<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use App\Http\Traits\Analytics;
use App\Subscription;

trait Customers {
    use Analytics;


    public function customers(){
        return json_decode(json_encode([
            'data'=>[
                'users'=>$this->total_users(),
                'payments'=>$this->payments(),
                'descP'=>$this->paymentsD()->take(10),
                'descU'=>$this->total_users()->take(11),
                'subscription'=>$this->active_subscription()
            ],
            'stats'=> [
                'user'=> [
                    'growth'=>$this->users_growth(),
                    'total'=>count($this->total_users()),
                ],
                'payments'=> [
                    'total'=> $this->payments()->sum('total'),
                    'growth'=> $this->payments_growth()
                ]
            ]
        ]), FALSE);


    }




}
