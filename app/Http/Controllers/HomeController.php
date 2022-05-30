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
use App\Models\Memo;
use App\Models\Customer;
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
    public function deleteList(Request $request){
        $data=$request->all();
        if($data['submit']!=null && $data['submit']!=""){

            $temp=PurchaseList::findOrFail($data['_id_']);
            if($temp->delete()){
                return redirect()->route('purchase.list')
                    ->with('success','Deleted successfully');

            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to delete!');
            }
        }
        else{
            return redirect()->route('purchase.list');
        }
    }

    public function deleteListAll(Request $request){
        $data=$request->all();
        if($data['submit']!=null && $data['submit']!=""){

            if(PurchaseList::truncate()){
                return redirect()->route('purchase.list')
                    ->with('success','Cleaned successfully');

            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to clean!');
            }
        }
        else{
            return redirect()->route('purchase.list');
        }
    }
    public function createMemo(){

        $tempPurchaseList=PurchaseList::get();

       if(sizeof($tempPurchaseList)>0){
           $totalPrice=0.0;
            foreach ($tempPurchaseList as $item){
                $totalPrice=$totalPrice+ floatval($item->Price);
            }
            $orderId = floor(microtime(true) * 1000);

           return View::make('pages.memo', compact('tempPurchaseList','totalPrice', 'orderId'));
        }
        else{
            redirect()->route('purchase.list');
        }
    }
    public function saveMemos(Request $request)
    {
        $data = $request->all();
        if ($data['submit'] != null && $data['submit'] != "") {
            $coustomer = Customer::where('Customer_Name', '=', $data['customer_name'])
                ->where('Phone_No', '=', $data['phone_no'])
                ->where('Address', '=', $data['address'])
                ->first();
            $customerID = -1;
            if ($coustomer == null) {
                $newCustomer = new Customer();
                $newCustomer->Customer_Name = $data['customer_name'];
                $newCustomer->Phone_No = $data['phone_no'];
                $newCustomer->Address = $data['address'];
                $newCustomer->save();
                $customerID = $newCustomer->id;
            } else {
                $customerID = $coustomer->id;
            }

            date_default_timezone_set('Asia/Dhaka');
            $tempPurchaseList = PurchaseList::where('Order_Id', 1)->get();
            $k = 0;
            $itemList = "";
            foreach ($tempPurchaseList as $item) {
                if ($k != 0) {
                    $itemList .= ",";
                }
                $item->Order_Id = $data['order_id'];
                $item->save();
                $itemList .= $item->medicine_name . " (" . $item->quantity . ") ";
                $k++;
            }

            $history = new Memo();
            $history->User_Id = Auth::user()->id;
            $history->Order_Id = $data['order_id'];
            $history->Customer_Id = $customerID;
            $history->Total_Price = $data['total_price'];
            $history->Paid_Amount = $data['paid_amount'];
            $history->Item_List = $itemList;
            $history->Posted = date('Y-m-d H:i:s');

            if ($history->save()) {
                return redirect()->route('home')
                    ->with('success', 'Memo recorded successfully');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to record!');
            }
        } else {
            return redirect()->route('purchase.list');
        }
    }

}
