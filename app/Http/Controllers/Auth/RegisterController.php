<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserInfo;
use App\User;
use App\Models\Company;
use App\Models\Member;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Mail;

use App\Mail\adminEmail;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        return LaravelLocalization::setLocale().'/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //return true;
        return Validator::make($data, [
            //'name' => 'required',
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            //'password' => 'required|string|min:6|confirmed',
            //'mobile' => 'required|numeric|min:10',
            //'country_id'=>'required',
            //'city_id'=>'required',
            //'address'=>'required',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $userInfo  = new UserInfo();
        $userInfo->UserID = $user->UserID;

        $userInfo->mobile = $data['mobile'];
        $userInfo->address = $data['address'];
        $userInfo->country_id = $data['country_id'];
        $userInfo->city_id  = $data['city_id'];
        $userInfo->role_id  = $data['role_id'];
        $userInfo->save();
       
       if ($data['role_id'] == 3){
        $company_info = new Company();
         $company_info->UserInfoID = $user->UserInfo->UserInfoID;
         $company_info->register_no = $data['register_no'];
         $company_info->save();
       }else{
        $member_info = new Member();
         $member_info->UserInfoID = $user->UserInfo->UserInfoID;
         $member_info->save();
       }
       

        

       Mail::to('haderhasan904@gmail.com')->send(new adminEmail($user));
       
        return $user;

    }


}
