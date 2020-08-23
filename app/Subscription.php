<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['customer_id','plan_id','due_on','subscription_status','auto_renewal'];


    public function customer(){
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function plan(){
        return $this->hasOne(Plans::class,'id', 'plan_id');
    }

}
