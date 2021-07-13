<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id =  \Auth::user()->UserID;
        $packages = Package::where('company_id',$id)->get();
     //  dd($packages);
//            $packages_ar = Package::where('name_ar' , '!=','null')->get();
//            $packages_en = Package::where('name_en' , '!=','null')->get();


     return view('company.packages.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('company.packages.create');
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
                'name_en' => 'required',
                'length' => 'required',
                'width' => 'required',
                'height' => 'required',
                'weight' => 'required',
                'type_ar' => 'required',
            ]);

        $name_ar = $request->input('name_ar');
        $name_en = $request->input('name_en');
        $length =  $request->input('length');
        $width = $request->input('width');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $type_ar = $request->input('type_ar');
        $type_en = $request->input('type_en');
        $package = new Package();
        $package->company_id = \Auth::user()->UserID;
        if(LaravelLocalization::setLocale()=='ar'){
        
            $package->type_ar = $type_ar;
        }else{
         
            $package->type_en = $type_en;
        }
        $package->name_en = $name_en;
        $package->name_ar = $name_ar;
        $package->length = $length;
        $package->width = $width;
        $package->height = $height;
        $package->weight = $weight;


        $package->save();


        return Redirect::to(LaravelLocalization::setLocale().'/company/packages')->with('success',__('company/config.RecordInsertedSuccessfully'));



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

       $package = Package::findOrFail($id);
       //dd($package);
       return view('company.packages.edit',compact('package'));
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
        $length =  $request->input('length');
        $width = $request->input('width');
        $height = $request->input('height');
        $weight = $request->input('weight');
//        $type_ar = $request->input('type_ar');
//        $type_en = $request->input('type_en');
        $package = Package::find($id);
        if(LaravelLocalization::setLocale()=='ar'){
            $package->name_ar = $name_ar;
//            $package->type_ar = $type_ar;
        }else{
            $package->name_en = $name_en;
//            $package->type_en = $type_en;
        }
        $package->length = $length;
        $package->width = $width;
        $package->height = $height;
        $package->weight = $weight;

        $package->save();
        return Redirect::to(LaravelLocalization::setLocale().'/company/packages')->with('success',__('company/config.RecordUpdatedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


       
       $item = Package::where('id',$id);
       $item->delete();
        return redirect()->route('packages.index')
            ->with('success', 'User deleted successfully');
    }
        
      



}
