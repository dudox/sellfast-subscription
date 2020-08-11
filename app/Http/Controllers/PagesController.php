<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function flutterwave(){

    }

    public function basic(){
        return view('pages.basics.index');
    }

    public function subscription(){
        return view('pages.subscription.index');
    }

    public function plans(){
        return view('pages.plans.index');
    }


}
