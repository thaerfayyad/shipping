<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class WebsiteMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $type = 'web';
		$menu 	= new Menu();
        $menu   = $menu->getHTML($type);
        // dd($menu);
        return view('admin.website-menu.create', array('menu'=>$menu));
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
            'title' => 'required',
            'url' => 'required',
        ]);


        // dd(URL(\Lang::getLocale(),$request->url.'.html'));
		$menu = new Menu;
		$menu->title = $request->title;
		$menu->title_en = $request->title_en;
		$menu->url = $request->url;
		$menu->parent_id = 0;
		$menu->order = 0;
		$menu->type = 'web';
        $menu->save();
        return redirect()->back()->with('success', trans('admin/menu.alert.success.insert'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postIndex(Request $request)
    {
	    $source       = $request->source ;
        $destination  =  $request->input('destination') ?: 0;

        $item             = Menu::find($source);
        $item->parent_id  = $destination;
	    $item->save();

	    $ordering       = json_decode($request->order);
	    $rootOrdering       = json_decode($request->rootOrder);

	    if($ordering){
	      foreach($ordering as $order=>$item_id){
	        if($itemToOrder = Menu::find($item_id)){
	            $itemToOrder->order = $order;
	            $itemToOrder->save();
	        }
	      }
	    } else {
	      foreach($rootOrdering as $order=>$item_id){
	        if($itemToOrder = Menu::find($item_id)){
	            $itemToOrder->order = $order;
	            $itemToOrder->save();
	        }
	      }
	    }

        return response()->json('ok');


	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    public function updateStatus($id)
    {
        $statuss = '0';
        $menu = Menu::FindOrFail($id);

        if($menu->status == '0'){
            $statuss = '1';
        }

        $menu->status = $statuss;
        $menu->save();
        return redirect()->back()->with('success', trans('admin/menu.alert.success.update'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);
        $menu = Menu::FindOrFail($id);
        $menu->title = $request->title;
        $menu->title_en = $request->title_en;
        $menu->url = $request->url;
        $menu->save();

        return redirect()->back()->with('success', trans('admin/menu.alert.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $items = Menu::where('parent_id', $menu->id)->get()->each(function($item)
		{
			$item->parent_id = 0;
			$item->save();
        });

        $menu->delete();
        return redirect()->back()->with('success', trans('admin/menu.alert.success.delete'));
    }
}
