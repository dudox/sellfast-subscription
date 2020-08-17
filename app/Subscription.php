<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['receiptID','referenceID'];


    public function payment(){
        return $this->belongsTo(Payments::class, 'receiptID');
    }

    public function plan(){
        return $this->hasOne(Plans::class,'id', 'plan_id');
    }

}
