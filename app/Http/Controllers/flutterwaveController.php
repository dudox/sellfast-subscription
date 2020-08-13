<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class flutterwaveController extends Controller
{
    //

    public function __construct()
    {

    }

    public function handler(){
        dd(request());
    }
}
