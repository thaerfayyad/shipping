<?php

namespace social_coordination_center\Repositories;

use Illuminate\Database\Eloquent\Model;
use social_coordination_center\Models\UserInfo;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use DB;

class UserInfoRepository extends BaseRepository
{
    protected $model;

    /**
     * UserInfoRepository constructor.
     * @param UserInfo $userinfo
     */
    public function __construct(UserInfo $userinfo)
    {
        $this->model = $userinfo;
    }

     /**
     * Get Model and return the instance.
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function Cities()
    {
        $userinfos = $this->model;
        $items = $userinfos->select('city')->distinct('city')->pluck('city', 'city');
        return $items;
    }




}
