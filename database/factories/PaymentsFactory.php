<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customers;
use App\Payments;
use Faker\Generator as Faker;

$factory->define(Payments::class, function (Faker $faker) {
    return [
        'customer_id' =>factory(Customers::class)->create()->id,
        'plan_id'=>mt_rand(1,2),
        'token'=>mt_rand(1111111,8888888),
        'status'=>'approved',
        'created_at'=>$faker->dateTimeBetween('-360 days', '+30 days')
    ];
});
