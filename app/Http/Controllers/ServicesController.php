<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ServicesController extends Controller
{
    public function index()
    {
    	
        $services = Service::take(9)->get();

        return view('Site.services.index', [
            'services' => $services,
        ]);
    }

}
