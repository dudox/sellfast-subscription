<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = ['username'];

    public function payments(){
        return $this->hasMany(Payments::class, 'customer_id');
    }
}
