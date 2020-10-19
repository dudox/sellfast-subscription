<?php

use App\Payments;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $faker = Faker\Factory::create();

        for($i = 0; $i < 300; $i++) {
            Payments::create([
                'customer_id'=>mt_rand(1,30),
                'plan_id'=>mt_rand(1,2),
                'token'=>mt_rand(1111111,8888888),
                'status'=>'approved',
                'created_at'=>$faker->dateTimeBetween('-120 days', '+30 days')

            ]);
        }
    }
}
