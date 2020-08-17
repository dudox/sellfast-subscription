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
        factory(Customers::class, 100)->create()->each(function($customer) {

            $customer->payments()->saveMany(
                factory(Payments::class,10)->create()->each(function($payment){
                    $payment->subscription()->save(
                        factory(Subscription::class)->make()
                    );
                })
            );

        });

    }
}
