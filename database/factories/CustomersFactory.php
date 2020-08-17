<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customers;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Customers::class, function (Faker $faker) {
    return [
        'username'=>$faker->unique()->userName,
        'name'=>$faker->unique()->name,
        'phone'=>$faker->unique()->phoneNumber
    ];
});
