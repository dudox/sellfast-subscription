<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
       'customer_id','plan_id','proof','token'
    ];

    public function plans(){
        return $this->hasOne(Plans::class,'id','plan_id');
    }

    public function subscription(){
        return $this->hasOne(Subscription::class,'plan_id','plan_id');
    }

    public function customer(){
        return $this->hasOne(Customers::class,'id','customer_id');
    }
}
