<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{

    protected $fillable = [
        'username','phone'
    ];

    public function payments(){
        return $this->hasMany(Payments::class, 'customer_id');
    }

    public function subscription(){
        return $this->hasOne(Subscription::class, 'customer_id');
    }
}
