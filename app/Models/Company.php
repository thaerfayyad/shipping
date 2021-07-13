<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $table = 'companies';
     protected $primaryKey = 'CompanyID'; 
    protected $fillable = ['UserInfoID','register_no'];

    // Get services
    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

    // Get members
    public function members()
    {
        return $this->belongsToMany('App\Models\Member');
    }
    // Get packages
    public function packages()
    {
        return $this->hasMany('App\Models\Package');
    }

    // Get zones
    public function zones()
    {
        return $this->hasMany('App\Models\Zone');
    }
    public function userInfo()
    {
        return $this->belongsTo('App\Models\UserInfo','UserInfoID');
    }
     public function orders()
    {
        return $this->hasMany(Order::class,'CompanyID');
    }

}
