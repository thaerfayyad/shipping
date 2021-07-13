<?php

namespace App\Http\Controllers\Company;

use App\Models\Admin\ShippingMethod;
use App\Models\Currency;
use App\Models\Package;
use App\Models\Zone;
use App\Models\ZonePrice;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZonePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::where('company_id', \Auth::user()->UserID)->get();
        $packages = Package::where('company_id', \Auth::user()->UserID)->get();
        $shipping_methods = ShippingMethod::all();
        $currencies = Currency::where('id',2)->get();
       // dd($currencies);

        
      return view('company.zones_prices.create',compact('zones','packages','shipping_methods','currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function insert(Request $request)
    {

//        $request->validate([
//            'addmore.*.package_id' => 'required',
//            'addmore.*.shipping_method_id' => 'required',
//            'addmore.*.currency_id' => 'required',
//            'addmore.*.price' => 'required',
//            'zone_id'=>'required'
//        ]);
//

            foreach ($request->addmore as $key => $value) {
                $value['zone_id'] = $request->zone_id;
                ZonePrice::create($value);
            }

        return back()->with('success',__('company/config.RecordInsertedSuccessfully'));
    }
//        if ($request->ajax()) {
//            $rules = array(
//                'package_id.*' => 'required',
//                'shipping_method_id.*' => 'required',
//                'currency_id.*' => 'required',
//                'price.*' => 'required'
//            );
//            $error = Validator::make($request->all(), $rules);
//            if ($error->fails()) {
//                return response()->json([
//                    'error' => $error->errors()->all()
//                ]);
//            }
//            $package_id = $request->package_id;
//            $shipping_method_id = $request->shipping_method_id;
//            $price = $request->price;
//            $currency_id = $request->currency_id;
//
//            for ($count = 0; $count < count($package_id); $count++) {
//                $data = array(
//                    'package_id' => $package_id[$count],
//                    'shipping_method_id' => $shipping_method_id[$count],
//                    'price' => $price[$count],
//                    'currency_id' => $currency_id[$count],
//                );
//                $insert_data[] = $data;
//
//            }
//            ZonePrice::insert($insert_data);
//            return response()->json([
//                'success' => 'Add Successfully'
//            ]);
//        }

}
