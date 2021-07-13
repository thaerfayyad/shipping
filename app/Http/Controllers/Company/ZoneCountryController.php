<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zone_Country;
use App\Models\Zone;
use Auth;

class ZoneCountryController extends Controller
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
        //
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
            $zone = new Zone();
            $zone->name_ar = $request->name_ar;
            $zone->company_id = Auth::user()->UserID;
            $zone->save();
            foreach ($request->addmore as $key => $value) {
                $value['company_id'] = Auth::user()->UserID;

                  $value['zone_id'] = $zone->id;
                 // $value['name_en'] = $request->name_en;
               
                Zone_Country::create($value);
            }

           

        return back()->with('success',__('company/config.RecordInsertedSuccessfully'));
    }
}
