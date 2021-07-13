<?php

namespace App\Http\Controllers\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserInfo;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use Auth;

class ProfileController extends Controller
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
        // $id = \Auth::user()->UserID;
        $user = User::find($id);
        $countries=Country::all();
        
        return view('company.profile.edit',compact('user','countries'));
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

       $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $address = $request->input('address');
        $about = $request->input('about');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $services = $request->input('services');
        $country_id = $request->input('country_id');
        $city_id = $request->input('city_id');
         $register_no = $request->input('register_no');
        $user = User::find($id);
        $user->name = $name;
        $user->email = $email;
        $user->save();
    
        $userInfo = UserInfo::find($user->userInfo->UserInfoID);

        $userInfo->mobile = $mobile;
        $userInfo->address = $address;
        $userInfo->about = $about;
        $userInfo->facebook = $facebook;
        $userInfo->twitter = $twitter;
        $userInfo->services = $services;
        $userInfo->country_id = $country_id;
        $userInfo->city_id = $city_id;
        //dd($userInfo->mobile);
        //dd( $userInfo->services);
        if(  $request->avatar != Null){


        $avatarName = $userInfo->UserInfoID.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $userInfo->avatar = $avatarName;
    }
        $userInfo->save();
     
     $company_info = Company::find($user->userInfo->company->CompanyID);
     $company_info->register_no = $register_no;
     //dd($company_info->register_no);
     $company_info->save();

     session()->flash("success",__('company/config.RecordUpdatedSuccessfully'));
        return redirect()->back();
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
