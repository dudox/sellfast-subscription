<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

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
    shuffle($strings);

    $startingDate = $faker->dateTimeThisYear('+1 month');
    $endingDate   = strtotime('+1 Month', $startingDate->getTimestamp());

    return [
        'payment_id'=>factory(Payments::class,3)->create(),
        'due_on'=>$endingDate,
        'subscription_status'=>reset($strings),
        'auto_renewal'=>'yes',
        'created_at'=>$startingDate
    ];
});
