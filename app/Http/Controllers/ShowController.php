<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\customValidatior;

class ShowController extends Controller
{
    public function showMedicine(){
        $user_id=Auth::user()->id;

        return view('pages.medicineList');
    }

}
