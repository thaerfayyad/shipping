<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\ShippingMethod;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ShippingMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping_methods = ShippingMethod::all();
        return view('admin.shipping_methods.index',compact('shipping_methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $shipping_method = ShippingMethod::findOrFail($id);
        return view('admin.shipping_methods.edit',compact('shipping_method'));
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
        $title_ar = $request->input('title_ar');
        $title_en = $request->input('title_en');

        $shipping_method = ShippingMethod::find($id);
        $shipping_method->title_ar = $title_ar;
        $shipping_method->title_en = $title_en;

        $shipping_method->save();
        return Redirect::to(LaravelLocalization::setLocale().'/admin/shipping-methods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping_method = ShippingMethod::findorfail($id);
        $shipping_method->delete();

        // redirect
        Session::flash('success', trans('config.alert.success.delete'));
        return Redirect::to(LaravelLocalization::setLocale().'/admin/shipping-methods');
    }
}
