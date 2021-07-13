<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserInfo extends Model
{
    use SoftDeletes;

    protected $table = 'user_info';
    protected $primaryKey = 'UserInfoID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'UserID', 'address','mobile', 'facebook','twitter','about','city_id','country_id','avatar','services',
    ];

    // Get users
    public function user()
    {
        return $this->belongsTo('App\User','UserID');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
     public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
     public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

     public function company()
    {
        return $this->hasOne('App\Models\Company','UserInfoID');
    }

    
}
