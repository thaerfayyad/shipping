<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Zone_Country;
use App\Models\ZonePrice;
use App\Models\Package;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\User;
use App\Models\Company;
use App\Models\Payment;
use App\Models\Bank;
use App\Models\Order;
use App\Models\Order_Temp;

use Auth;


use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id =  \Auth::user()->UserID;
 //dd($id);
        $orders = Order::where('UserID',$id)->get();
        // foreach ($orders as $key => $value) {
        //   dd($value->userInfo);
        // }
    

        return view('Site.orders.index',[
            'orders'=>$orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
      
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      

}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

     public function  getCountriesFrom($id){

    
       $countries = Zone_Country::select('country_id_from')->
       where('company_id',$id)->with('countries_from')->distinct()->get();
        //dd($countries);

         return response()->json([
       'countries' => $countries,
        'success' => "success"
    ]);
    }

    public function  getCountriesTo($id){

    
       $countries = Zone_Country::select('country_id_to','zone_id')->
       where('country_id_from',$id)->with('countries_to')->distinct()->get();
        //dd($countries);

        return response()->json([
       'countries' => $countries,
        'success' => "success"
    ]);
    }
   
     public function  getPackageTypes($id){

   
       $packageTypes = ZonePrice::select('package_id')->
       where('zone_id',$id)->with('packages')->distinct()->orderBy('package_id','asc')->get();
        //dd($packageTypes);

         return response()->json([
       'packageTypes' => $packageTypes,
        'success' => "success"
    ]);
    }

     public function  getShippingMethods($id,$zone_id){
      

       $shippingMethods = ZonePrice::select('shipping_method_id')
       ->where('package_id',$id)->where('zone_id',$zone_id)->with('shipping_methods')->distinct()->orderBy('shipping_method_id','asc')->get();
        //dd($shippingMethods);

         return response()->json([
       'shippingMethods' => $shippingMethods,
        'success' => "success"
    ]);
    }

public function  getShippingPrice($id){

    
       $price = ZonePrice::select('price','currency_id')->
       where('shipping_method_id',$id)->with('shipping_methods')
       ->with('currencies')->distinct()->get();
        //dd($price);

        return response()->json([
       'price' => $price,
        'success' => "success"
    ]);
    }

}
