<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\User;
use App\Models\Country;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $services = Service::all();
        return view('admin.services.index',[
            'services'=>$services,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'label' => 'required|max:255',
            'des_ar' => 'required',
            'des_en' => 'required',
            'img' => 'required',

        ]);
        $service = new Service();
        $service->title =$request ->title;
        $service->label =$request ->label;
        $service->des_ar =$request ->des_ar;
        $service->des_en =$request ->des_en;
        $service->img =$request ->img;
        if(  $request->img != Null){

            $imgName = $service->id.'_img'.time().'.'.request()->img->getClientOriginalExtension();

            $request->img->storeAs('img',$imgName);


            $service->img = $imgName;
        }
        $service ->save();

        return redirect()->back()->with(['message' => 'Record is saved into the database', 'alert' => 'alert-success']);

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
        $service = Service::find($id);


        return view('admin.services.edit',[
            'service'=>$service,
        ]);
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
        $service = Service::find($id);

        $service->title =$request ->title;
        $service->label =$request ->label;
        $service->des_ar =$request ->des_ar;
        $service->des_en =$request ->des_en;
        
        if(  $request->img != Null){

            $imgName = $service->id.'_img'.time().'.'.request()->img->getClientOriginalExtension();

            $request->img->storeAs('img',$imgName);


            $service->img = $imgName;
        }
        $service ->save();

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $ser = Service::find($id);
            if (!$ser) {
                return redirect()->route('services.index');
            }
            $ser->delete();
            return redirect()->route('services.index');


        } catch (\Exception $ex) {
            return redirect()->route('services.index');
        }
    }
}
