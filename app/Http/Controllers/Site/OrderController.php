<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $companies = Company::with('userInfo.user')->get();
      // dd($companies);

       $payment_methods = Payment::all();
        $banks = Bank::all();
       
        return view('Site.orders.create',compact('companies','payment_methods','banks'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Auth::user()) {
        
       $order = new Order();
       //dd($order);
       $order->order_number = str_pad(mt_rand(0, 9999), 2, '0', STR_PAD_LEFT);
       $order->UserID =  \Auth::user()->UserID;
       $order->CompanyID = $request->CompanyID;
       $order->country_from = $request->country_from;
       $order->country_to = $request->country_to;
       $order->PackageID = $request->PackageID;
       $order->Shipping_method_id = $request->Shipping_method_id;
       $order->price = $request->price;
       $order->payment_method_id = $request->payment_method_id;
       $order->bank_id = $request->bank_id;
       $order->send_date = date('Y-m-d  H-i-s', strtotime(request('send_date')));

       $order->delivered_date = date('Y-m-d  H-i-s', strtotime(request('delivered_date')));

       $order->price_commission = $request->price + $request->price_commission;
    
       $order->save();
        return redirect()->back();
    
    } else {
       $order_temp = new Order_Temp();
       //dd($order_temp);
       $order_temp->order_number = str_pad(mt_rand(0, 9999), 2, '0', STR_PAD_LEFT);
       // $order_temp->UserID =  \Auth::user()->UserID;
       $order_temp->CompanyID = $request->CompanyID;
       $order_temp->country_from = $request->country_from;
       $order_temp->country_to = $request->country_to;
       $order_temp->PackageID = $request->PackageID;
       $order_temp->Shipping_method_id = $request->Shipping_method_id;
       $order_temp->price = $request->price;
       $order_temp->payment_method_id = $request->payment_method_id;
       $order_temp->bank_id = $request->bank_id;
       $order_temp->send_date = date('Y-m-d  H-i-s', strtotime(request('send_date')));

       $order_temp->delivered_date = date('Y-m-d  H-i-s', strtotime(request('delivered_date')));

       $order_temp->price_commission = $request->price + $request->price_commission;
    
       $order_temp->save();

        return redirect()->to(LaravelLocalization::setLocale().'/login?id='.$order_temp->id);
    }     
      

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
