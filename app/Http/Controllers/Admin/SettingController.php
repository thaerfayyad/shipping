<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.settings.index');
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
        $arPrefix = 'ar_';
        $enPrefix = 'en_';
        foreach($request->value as $ky => $val){
            $lang = 'all';

            if(!is_null($val)){

                if (substr($ky, 0, strlen($arPrefix)) == $arPrefix) {
                    $ky = substr($ky, strlen($arPrefix));
                    $lang = 'ar';

                }elseif (substr($ky, 0, strlen($enPrefix)) == $enPrefix) {
                    $ky = substr($ky, strlen($enPrefix));
                    $lang = 'en';

                }

                Setting::updateOrCreate(
                    ['key' => $ky, 'language' => $lang],
                    ['value' => $val]
                );
            }

    }
    
     return redirect()->back()->with('success','تمت العملية بنجاح');

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
}
