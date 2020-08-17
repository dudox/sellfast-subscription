<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'name','phone_number','insta_username','amount','bank_name','email_address','proof','receiptID'
    ];

    public function plans(){
        return $this->hasOne(Plans::class,'id');
    }

    public function subscription(){
        return $this->hasOne(Subscription::class,'payment_id');
    }
}
