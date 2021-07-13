<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::select(DB::raw("name as text"));

        if (request()->has('searchTerm')) {
            $cities =    $cities->where('name', 'like', '%'.request()->searchTerm.'%');
        }

        if (request()->has('country_id') && (!is_null(request()->country_id) && request()->country_id != 'all' )) {
            $cities =    $cities->where('country_id', request()->country_id);
        }

        $cities =    $cities->distinct('name')->get();

        if(count($cities)=='0'){
            $cities->prepend(['id'=>'all','text'=>  trans('config.all')]);
        }else{
            $cities->prepend(['id'=>'all','text'=>  trans('config.all')]);
        }

        return response()->json($cities);
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
    public function show($lang)
    {
        
        $name = 'name';

        if($lang == 'en')
            $name = 'name_en';

        $cities = City::select(DB::raw("$name as text"));
            if (request()->has('searchTerm')) {

                $cities =    $cities->where('name', 'like', '%'.request()->searchTerm.'%');


            }
       $cities =    $cities->where('country', request()->country);

        if (request()->has('filiter')) {
            $cities->prepend(['id'=>'all','text'=>  trans('config.all')]);
        }

        return response()->json($cities);
    }

    //     $all = trans('config.all');
    //     $notFound = "لايوجد";
        
    //     if($id == 'en')
    //         $notFound = "Not found";


        
    //     $cities = City::select(DB::raw("name as text"));

    //     if (request()->has('searchTerm')) {
    //         $cities =    $cities->where('name', 'like', '%'.request()->searchTerm.'%');

    //     }
    //     if (request()->has('country') && (!is_null(request()->country) && request()->country != 'all' )) {
    //         $cities =    $cities->where('country', request()->country);
    //     }

    //     $cities =    $cities->distinct('name')->get();

    //     $_cities = collect();
    //     foreach ($cities as $key => $value) {
    //         if($id == 'ar'){
    //             $all = 'ALL';


    //         if ((!preg_match('/[^A-Za-z0-9]/', $value->text))){
    //             $_array = array('id' => $value->text, 'text' => $value->text );
    //             $_cities->push($_array);
    //         }
    //         }else{

    //            if ((preg_match('/[^A-Za-z0-9]/', $value->text))){
    //             $_array = array('id' => $value->text, 'text' => $value->text );
    //             $_cities->push($_array);
    //         }
    //         }
    //     }
     
    //     if(count($cities)=='0'){
    //         // $_cities->prepend(['id'=>'all','text'=>  trans('config.all')]);
    //         $_cities->prepend(['id'=>'Null','text'=>  $notFound]);

    //     }else{
    //         $_cities->prepend(['id'=>'all','text'=>  $all]);
    //     }
    //     // exit();

    //     return response()->json($_cities);
    // }

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
}
