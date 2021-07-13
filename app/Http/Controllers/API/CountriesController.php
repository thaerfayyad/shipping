<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use DB;

class CountriesController extends Controller
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
     * @param  char(2)  $lang
     * @return \Illuminate\Http\Response
     */
    public function show($lang)
    {
        
        $name = 'name';

        if($lang == 'en')
            $name = 'name_en';

        $countries = Country::select(DB::raw("id as id, $name as text"));
            if (request()->has('searchTerm')) {

                $countries =    $countries->where('name', 'like', '%'.request()->searchTerm.'%');


            }
        $countries =    $countries->get();

        if (request()->has('filiter')) {
            $countries->prepend(['id'=>'all','text'=>  trans('config.all')]);
        }

        return response()->json($countries);

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
}
