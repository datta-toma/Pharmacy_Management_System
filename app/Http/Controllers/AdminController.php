<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('admin.dashboard');
    }


    //logout part
    public function flush(Request $request)
    {
        $r=$request->session()->flush();

        return Redirect::to('/login');
    }



    //logindashboard for admin
    public function login_dashboard(Request $request)
    {
        //return view('admin.dashboard');
        $username=$request->admin_username;
        $email=$request->admin_email;
        $password=md5($request->admin_password);
        $result ='DB'::table('admin_tbl')
        ->where('admin_username',$username)
        ->where('admin_email',$email)
        ->where('admin_password',$password)
        ->first();

        if($result){
            Session::put('admin_email',$result->admin_email);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/admin_dashboard');
        }
        else{
            Session::put('exception','username,email or password Invalid');
            return Redirect::to('/login');
        }
    }
}
