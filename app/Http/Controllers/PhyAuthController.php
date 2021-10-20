<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhyAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }
    public function registration()
    {
        return view("auth.registration");
    }

    public function onSuccess(Request $req)
    {
          print(" validation not done yet");
    }



}
