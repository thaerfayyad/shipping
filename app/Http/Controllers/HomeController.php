<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Service;
use App\Models\Order;
use App\Models\Member;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Pagination\Paginator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
        $this->middleware('auth', ['except' =>[ 'getCities','aboutUs','index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $services =Service::take(3)->get();
         $orders = Order::get()->count();
         $members = Member::get()->count();
         $companies = Company::get()->count();
         $countries = Country::get()->count();
         $fav_companies = Company::with('userInfo')->take(10)->get();
         // foreach ($fav_companies as $key => $value) {
         //    dd($value->userInfo->mobile);
         // }
        
           return view('home',[
            'services'=>$services,
            'orders'=>$orders,
            'members'=>$members,
             'companies'=>$companies,
             'countries'=>$countries,
             'fav_companies'=>$fav_companies,
        ]);

    }
  
    public function  getCities(Request $request){

        $currentPage = $request->page;
        // force current page to 5
        Paginator::currentPageResolver(function() use ($currentPage) {
            return $currentPage;
        });
       $cities = City::where('country_id',$request->id)->where('name','like','%'.$request->search.'%')->paginate(20);
         return response()->json([
          
            'cities' => $cities,
            'success' => "success"
        ]);
    }

    public function aboutUs(){
        return view('Site.about.index');
    }
}
