<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\User;
use App\Models\Country;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $companies = Company::all();


// foreach ($companies as $k) {
//    dd($k->userInfo->user->name);
// }
     
        return view('admin.companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();
        return view('admin.companies.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         


    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->active = 1;
    $user->password = bcrypt($request->password);
    if ($user->save()){


    $user_info = new UserInfo();
    $user_info->UserID =  $user->UserID;
    $user_info->address = $request->address;
    $user_info->mobile = $request->mobile;
    $user_info->facebook = $request->facebook;
    $user_info->twitter = $request->twitter;
    $user_info->about = $request->about;
    $user_info->city_id = $request->city_id;
    $user_info->country_id = $request->country_id;

    if(  $request->avatar != Null){

            $avatarName = $user_info->UserInfoID.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

            $request->avatar->storeAs('avatars',$avatarName);

            $user_info->avatar = $avatarName;
    }
    $user_info->role_id = 3;

    if ($user_info->save()){

    $company_info = new Company();
    $company_info->UserInfoID = $user_info->UserInfoID;
    $company_info->register_no = $request->register_no;
    $company_info->save();
    }
    }
 return redirect(LaravelLocalization::setLocale().'/admin/companies')->with('success',__('company/config.RecordInsertedSuccessfully'));
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
        $company = Company::with('userInfo.user')->find($id);
        $countries = Country::get();
        return view('admin.companies.edit',compact('company','countries'));
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

        $name = $request->input('name');

        $company = Company::with('userInfo.user')->findOrfail($id);
        $company->name = $name;
        // dd($company->name);
        $company->userInfo->user->email = $request->email;
        $company->userInfo->user->active = 1;
        $company->userInfo->user->password = bcrypt($request->password);

        if ($company->userInfo->user->save()){


            $user_info =  UserInfo::findOrfail($company->userInfo->UserInfoID);
           
            $user_info->address = $request->address;
            $user_info->mobile = $request->mobile;
            $user_info->facebook = $request->facebook;
            $user_info->twitter = $request->twitter;
            $user_info->city_id = $request->city_id;
            $user_info->country_id = $request->country_id;
            if(  $request->avatar != Null){

                $avatarName = $user_info->UserInfoID.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

                $request->avatar->storeAs('avatars',$avatarName);

                $user_info->avatar = $avatarName;
            }
           

            if ($user_info->save()){

                $company_info = Company::findOrfail($user_info->company->CompanyID);
                $company_info->register_no =$request->register_no;
                $company_info->save();
            }
        }


        return redirect(LaravelLocalization::setLocale().'/admin/companies')->with('success',__('member/config.RecordInsertedSuccessfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $item = Company::where('CompanyID',$id);
       $item->delete();
        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }
}
