<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Track;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)

{
    $tracks = Track::where('order_id',$id)->orderBy('id','desc')->get();
 //   dd($tracks);
        return view('Site.tracks.index',[
           'tracks'=>$tracks,

            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $order = Order::find($id);
       // dd($order->countries_from->first()->name);
        return view('company.tracks.create',compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $track = new Track();
        $track->order_id = $request->order_id;
        $track->company_id = \Auth::user()->UserID;
        $track->current_location = $request->current_location;
        $track->latitude = $request->latitude;
        $track->longitude = $request->longitude;


        $track->save();

        return redirect()->to(LaravelLocalization::setLocale().'/company/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tracks = Track::where('order_id',$id)->orderBy('id','desc')->get();
     // dd($tracks);
        return view('company.tracks.all_tracks_order',compact('tracks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
