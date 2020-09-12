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
        return view('pages.subscriptions.index');
    }

    public function plans(){
        return view('pages.plans.index');
    }

    public function smartonline(){
        return view('pages.smart.index');
    }

    public function starterpack(){
        return view('pages.starter.index');
    }



}
