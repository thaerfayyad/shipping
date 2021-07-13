<?php

namespace App\Http\Controllers\Company;

use App\Models\Admin\ShippingMethod;
use App\Models\City;
use App\Models\Country;
use App\Models\Zone;
use App\Models\Zone_Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Auth;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \Auth::user()->UserID;


        $zones = Zone::where('company_id',$id)->get();


        return view('company.zones.index',compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $countries = Country::get();
        //$cities = City::get();
        $countries = Country::all();
         return view('company.zones.create',['countries' => $countries]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name_ar' => 'required',
          //  'origin_country_ar' => 'required',

        ]);

        $name_ar = $request->input('name_ar');
        $name_en = $request->input('name_en');


        $zone = new Zone();
        $zone->company_id =  \Auth::user()->UserID;
        if(LaravelLocalization::setLocale()=='ar') {
            $zone->name_ar = $name_ar;
        }else{
            $zone->name_en = $name_en;
        }

        $zone->save();

        foreach($request->country_id as $country_id) {

            Zone_Country::create([
                'zone_id'   => $zone->id,
                'country_id' => $country_id,

            ]);

        }






//        $countries = $request->input('country_id');
//        $zone_id = $zone->id;
//        $countries = implode(',', $countries);
//
//        $input = $request->except('countries');
////Assign the "mutated" news value to $input
//        $input['country_id'] = $countries;
//        $input['zone_id'] = $zone_id;
//
//        Zone_Country::create($input);



        return Redirect::to(LaravelLocalization::setLocale().'/company/zones');
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
        $zone = Zone::findOrFail($id);
        return view('company.zones.edit',compact('zone'));
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
        $name_ar = $request->input('name_ar');
        $name_en = $request->input('name_en');
//        $origin_country_ar = $request->input('origin_country_ar');
//        $origin_country_en = $request->input('origin_country_en');

        $zone = Zone::find($id);
        $zone->name_ar = $name_ar;
        $zone->name_en = $name_en;
//        $zone->origin_country_ar = $origin_country_ar;
//        $zone->origin_country_en = $origin_country_en;
        $zone->company_id =  \Auth::user()->UserID;
        $zone->save();


        return Redirect::to(LaravelLocalization::setLocale().'/company/zones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $item = Zone::where('id',$id);
       $item->delete();
        return redirect()->route('zones.index')
            ->with('success', 'Zone deleted successfully');
    }

    // public function  getCitites(Request $request){

    //    $cities = City::whereIn('country_id',$request->id)->get();
    //      return response()->json([
    //    'cities' => $cities,
    //     'success' => "success"
    // ]);
    // }
    public function  getCities($id){

       $cities = City::where('country_id',$id)->get();

         return response()->json([
       'cities' => $cities,
        'success' => "success"
    ]);
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
                $value['company_id'] = Auth::user()->UserID;
                 // $value['name_ar'] = $request->name_ar;
                 // $value['name_en'] = $request->name_en;
               
                Zone::create($value);
            }

        return back()->with('success',__('company/config.RecordInsertedSuccessfully'));
    }
}
