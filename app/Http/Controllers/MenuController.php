<?php

namespace App\Http\Controllers;

use App\Models\Menu;

use Illuminate\Http\Request;

class MenuController extends Controller
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
    public function create($type = null)
    {

        $type = is_null($type) ? 'admin' : $type;
		$menu 	= new Menu();

        $menu   = $menu->getHTML();
       //dd($menu);

        return view('admin.menu.create', array('menu'=>$menu));
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
            'title_ar' => 'required',
            'label' => 'required',
            'url' => 'required',
            'type' => 'required',
        ]);


		$menu = new Menu;
		$menu->title_ar = $request->title_ar;
		$menu->label = $request->label;
		$menu->url = $request->url;
		$menu->parent_id = 0;
		$menu->order = 0;
		$menu->type = $request->type;
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
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'title_ar' => 'required',
            'label' => 'required',
            'url' => 'required',
        ]);

        $menu->update($request->all());

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
