<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class flutterwaveController extends Controller
{
    //

    public function __construct()
    {

    }

    public function handler(){
        echo Http::asForm()->post('http://login.betasms.com.ng/api/', [
            'username'=> env('BETA_SMS_USERNAME'),
            'password'=> env('BETA_SMS_SECRET'),
            'sender'=> env('BETA_SMS_ID'),
            'mobiles' =>"07017723208",
            'message'=>"Hello"
        ]);


        // $data = array('txref' => 'UZGF7CIC',
        // 'SECKEY' => 'FLWSECK-d9e9d5d961970f1236f48920ea3ebb53-X',
        // );





        // // make request to endpoint using unirest.
        // $headers = array('Content-Type' => 'application/json');
        // $body = \Unirest\Request\Body::json($data);
        // $url = "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify"; //please make sure to change this to production url when you go live

        // // Make `POST` request and handle response with unirest
        // $response = \Unirest\Request::post($url, $headers, $body);

        // //check the status is success
        // print_r($response->body->data);
        // // if ($response->body->data->status === "success" && $response->body->data->chargecode === "00") {
        // //     //confirm that the amount is the amount you wanted to charge

        // //     if ($response->body->data->amount === 100) {
        // //         echo("Give value");
        // //     }
        // // }
    }
}
