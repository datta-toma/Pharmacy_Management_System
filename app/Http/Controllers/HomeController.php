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
use App\Models\Medicine;
use App\Models\PurchaseList;
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

    public function tempPurchaseList(){

        $user_id=Auth::user()->id;

       $medicineData=Medicine::select('id','medicine_name')->where('User_Id',$user_id)->get();
       $tempPurchaseList=PurchaseList::get();

       return View::make('pages.purchase', compact('medicineData','tempPurchaseList'));
   }

    public function createProduct(Request $request){

        $data=$request->all();


            if($data['submit']!=null && $data['submit']!=""){
                $product = new Medicine();
                $product->User_Id = Auth::user()->id;
                $product->Medicine_Name  = $data['medicine_name'];
                $product->Generic_Name = $data['generic_name'];
                $product->Company =$data['medicine_company'];
                $product->Price_Rate =(float)$data['price_rate'];
                $product->Placed_On = $data['placed_on'];
                $product->Quantity = (int) $data['quantity'];
                $product->Status =$data['status'] == "Available" ? true : false;


                if($product->save()){
                    return redirect()->route('_addProduct')
                        ->with('success', 'Medicine added successfully');
                }else{
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Failed to add a product!');
                }
        }
        else{
            return redirect()->route('_addProduct');
        }

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
    public function createTempList(Request $request){
        $data=$request->all();
        if($data['submit']!=null && $data['submit']!=""){
            $medicine=Medicine::where('id',$data['selected_medicine'])->first();
            $quantity=intval($data['quantity']);
            $price=floatval($medicine->Price_Rate)*$quantity;

            $temp=new PurchaseList();
            $temp->Medicine_Name=$medicine->Medicine_Name;
            $temp->Quantity=$quantity;
            $temp->Price=$price;
            $temp->Order_Id=1;
            if($temp->save()){
                return redirect()->route('purchase.list')
                    ->with('success','Medicine addded successfully to list');

            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to added!');
            }
        }
        else{
            return redirect()->route('purchase.list');
        }
    }

}
