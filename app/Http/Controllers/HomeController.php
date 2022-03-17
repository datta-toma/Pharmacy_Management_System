<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\customValidatior;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return  redirect()->route('show.medicine');
    }

    public function addProducts(){
        return view('pages.addProduct');
    }

    public function userProfile($id){

        return view('pages.profile');
    }

    public function updateProfile(Request $request){
        $data=$request->all();
        if($data['submit']!=null && $data['submit']!=""){

            if($data['new_pass']==null){
                $user =User::findOrFail(Auth::user()->id);
                $user->name  = $data['name'];
                if($user->save()){
                    return redirect()->route('home')
                        ->with('success','Profile name updated successfully');

                }else{
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Failed to Edit information!');
                }
            }
            else if($data['new_pass']!=null){
                $user =User::findOrFail(Auth::user()->id);
                $user->name  = $data['name'];
                $user->password =Hash::make($data['new_pass']);
                if($user->save()){
                    return redirect()->route('home')
                        ->with('success','Password updated successfully');

                }else{
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Failed to Edit information!');
                }

            }

        }
        else{
            return redirect()->route('home');
        }
    }

}
