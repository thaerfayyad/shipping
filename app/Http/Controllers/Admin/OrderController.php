<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\User;
use App\Models\Country;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $orders = Order::all();
        $orders = Order::with('user.userInfo')->get();
    //  foreach($orders as $or){
    // dd($or->userInfo);
    // }

        return view('admin.orders.index',[
            'orders' =>$orders,
        ]);
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
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.orders.edit',compact('order'));
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
        //dd('546');
        $order = Order::find($id);
        //dd($order);
        $order->pay_status = $request->pay_status;
        $order->shipping_status = $request->shipping_status;

        $order->save();
        return redirect()->route('admin.show-orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item = Order::where('id',$id);
       $item->delete();
        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }
}
