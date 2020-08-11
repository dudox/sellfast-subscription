<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'name','phone_number','insta_username','amount','bank_name','email_address','proof','receiptID'
    ];
}
