<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Order_Temp;
use App\Models\Order;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = '/home';

    protected function redirectTo()
    {
        $user = \Auth::user();

        //$roles = $user->getRoleNames()->first(); // Returns a collection
        if( $user->active == '1' && $user->UserInfo->role_id == '2'){
            return LaravelLocalization::setLocale().'/member/profile/'.$user->UserID.'/edit';
        }elseif( $user->active == '1' && $user->UserInfo->role_id == '3'){
            return LaravelLocalization::setLocale().'/company/profile/'.$user->UserID.'/edit';
        }elseif($user->active == '1' && $user->UserInfo->role_id == '1'){
            return LaravelLocalization::setLocale().'/admin/profile/'.$user->UserID.'/edit';
        }else{
             
             return LaravelLocalization::setLocale().'/login';
        }

        }
    public function showLoginForm()
    {
        $data['pageName'] = trans('auth.login.login');
        return view('auth.login',$data);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // protected function validateLogin(Request $request)
    // {
    //     $request->validate([
    //         $this->username() => 'required|string',
    //         'password' => 'required|string',
    //         'active'=>'1',
            
    //     ]);
    // }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    // protected function credentials(Request $request)
    // {
    //     //return $request->only($this->username(), 'password','active'=>1);
    //     return ['email'=>$this->username(), 'password'=>$request->password,'active'=>1];
    // }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        if(isset($request->id)){

     $user = User::where($this->username(),'=',$request->{$this->username()})
            ->where('active','=','1')->first();
            //->whereNotNull('email_verified_at')->first();
        if ($user && Hash::check($request->password,$user->password)) {
            \Auth::login($user);
             $order_temp = Order_Temp::find($request->id);
   //dd($order_temp->order_number);

   $order = new Order();
   $order->order_number = $order_temp->order_number;
   $order->CompanyID = $order_temp->CompanyID;
   $order->PackageID = $order_temp->PackageID;
   $order->Shipping_method_id = $order_temp->Shipping_method_id;
    $order->price = $order_temp->price;
    $order->price_commission = $order_temp->price_commission;
    $order->send_date = $order_temp->send_date;
    $order->delivered_date = $order_temp->delivered_date;
    $order->country_from = $order_temp->country_from;
    $order->country_to = $order_temp->country_to;
    $order->payment_method_id = $order_temp->payment_method_id;
    $order->bank_id = $order_temp->bank_id;
     $order->UserID =   $user->UserID;
//dd($order->UserID);
    $order->save();
   
            return true;
        }

        return false;


    }else{

        $user = User::where($this->username(),'=',$request->{$this->username()})
            ->where('active','=','1')->first();
            //->whereNotNull('email_verified_at')->first();
        if ($user && Hash::check($request->password,$user->password)) {
            \Auth::login($user);
            return true;
        }

        return false;
    }
    }

   
}
