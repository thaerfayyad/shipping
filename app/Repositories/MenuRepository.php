<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class MenuRepository extends BaseRepository
{
    protected $model;

    /**
     * MenuRepository constructor.
     * @param Menu $menu
     */
    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }

     /**
     * Get Model and return the instance.
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function get()
    {

        return $this->model->with('children')->orderBy('order')->where('status','1')->where('type','admin')->get();

    }

     /**
     * Get Model and return the instance.
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getWebsiteUrl()
    {
        $query =  $this->model->with('children')->orderBy('order')->where('type','web')->where('status','1');

        // if(\App::getLocale() == 'en'){
        //     $query->select(\DB::raw('parent_id, title_en as title, url , "order"'));
        // }else{
        //     $query->select(\DB::raw('parent_id,title, url , "order"'));
        // }

        return $query->get();

    }



}
