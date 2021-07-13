<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Member;
use App\Models\UserInfo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MemberController extends Controller
{
    public function index()
    {

        $members = Member::get();
//        $members = Member::with('userInfo.user')->get();
      //  $member->userInfo->user
        return view('admin.members.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();
        return view('admin.members.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
           
        $user = User::find($id);
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($request->password);
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
        
        if(  $request->avatar != Null){


        $avatarName = $userInfo->UserInfoID.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $userInfo->avatar = $avatarName;
    }
 
        $user_info->role_id = 2;

        if ($user_info->save()){

        $member_info = new Member();
        $member_info->UserInfoID = $user_info->UserInfoID;
        $member_info->save();
        }
        

    session()->flash("success","__('company/config.RecordUpdatedSuccessfully')");
        return redirect(LaravelLocalization::setLocale().'/admin/members');

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
        $member = Member::with('userInfo.user')->findOrfail($id);
       // dd($member);
        $countries = Country::get();
        $cities=City::where("country_id",$member->UserInfo->country->id)->get();

        return view('admin.members.edit',compact('countries','member','cities'));
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

        $member = Member::with('userInfo.user')->findOrfail($id);
        $member->userInfo->user->name = $name;
        $member->userInfo->user->email = $request->email;
        $member->userInfo->user->active = 1;
        $member->userInfo->user->password = bcrypt($request->password);

        if ($member->userInfo->user->save()){


            $user_info = UserInfo::findOrfail($member->userInfo->UserInfoID);
            
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
           $user_info->save();
        }


        return redirect(LaravelLocalization::setLocale().'/admin/members');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item = Member::where('MemberID',$id);
       $item->delete();
        return redirect()->route('members.index')
            ->with('success', 'Member deleted successfully');
    }


}
