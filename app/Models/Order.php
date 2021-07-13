<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = ['order_number','pay_status','shipping_status','UserID','CompanyID','PackageID','Shipping_method_id','price','price_commission','send_date','delivered_date','country_from','country_to','payment_method_id','bank_id'];

    public function company(){
        return $this->belongsTo(Company::class,'CompanyID');
    }

    public function package(){
        return $this->belongsTo(Package::class,'PackageID');
    }
      public function shipping(){
        return $this->belongsTo('App\Models\Admin\ShippingMethod','Shipping_method_id');
    }
    public function userInfo(){
        return $this->hasMany(UserInfo::class,'UserInfoID');
    }
    public function user(){
        return $this->belongsTo(User::class ,'UserID');
    }
      
    public function tracks(){
        return $this->belongsTo(Track::class ,'id');
    }

    public function countries_from(){
        return $this->hasMany('App\Models\Country','id','country_from');
    }
    public function countries_to(){
        return $this->hasMany('App\Models\Country','id','country_to');
    }
}
