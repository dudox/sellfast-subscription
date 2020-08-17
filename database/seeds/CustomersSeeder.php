<?php

use Illuminate\Database\Seeder;
use App\Customers;
use App\Payments;
use App\Subscription;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customers::class, 200)->create()->each(function($customer) {

            $customer->payments()->saveMany(
                factory(Payments::class,10)->create()->each(function($payment){
                    $payment->subscription()->make();
                }),
            );

            $customer->subscription()->save(
                factory(Subscription::class)->create(),
            );

        });

    }
}
