<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'Emmanuel Ogolekwu',
                'email'=>'info@mayapro1.com',
                'password'=>Hash::make('@dm1n..12345')
            ],
            [
                'name'=>'Ahmed Ahmed',
                'email'=>'trybemark@gmail.com',
                'password'=>Hash::make('@dm1n..12345')
            ]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
