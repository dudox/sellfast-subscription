<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customers;
use App\Model;
use App\Payments;
use App\Subscription;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Subscription::class, function (Faker $faker) {
    $strings = array(
        'active',
        'expired',
    );
    $rand = mt_rand(1,2);
    $call = "yes";
    if($rand == 1){
        $call = "no";
    }
    shuffle($strings);

    $startingDate = $faker->dateTimeBetween(Carbon::now()->startOfYear(), 'now');
    $endingDate   = strtotime('+1 Month', $startingDate->getTimestamp());

    return [
        'customer_id'=>factory(Customers::class,3)->create(),
        'plan_id'=>mt_rand(1,2),
        'due_on'=>Carbon::parse($startingDate)->addMonth(1),
        'subscription_status'=>reset($strings),
        'auto_renewal'=>$call,
        'created_at'=>$startingDate
    ];
});
