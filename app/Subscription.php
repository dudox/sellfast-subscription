<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['receiptID','referenceID'];


    public function customer(){
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function plan(){
        return $this->hasOne(Plans::class,'id', 'plan_id');
    }

}
