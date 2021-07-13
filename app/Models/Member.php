<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;

    protected $table = 'members';
    protected $primaryKey = 'MemberID';

    // Get companies
    public function companies()
    {
        return $this->belongsToMany('App\Models\Company','member_company','member_id','company_id');
    }

    public function userInfo()
    {
        return $this->belongsTo(UserInfo::class,'UserInfoID');
    }
}
