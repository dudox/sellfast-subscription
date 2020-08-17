<?php

use App\Plans;
use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name'=>'basic',
                'amount'=>500,
                'validity'=>1

            ],
            [
                'name'=>'smart',
                'amount'=>600,
                'validity'=>1
            ]
        ];

        foreach($plans as $plan){
            Plans::create($plan);
        }
    }
}
