<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZonePrice extends Model
{
    use SoftDeletes;

    protected $table = 'zones_prices';
     protected $primaryKey = 'ZonePriceID';

    protected $fillable = ['ZonePriceID','package_id','shipping_method_id','zone_id','price','currency_id'];

    public function zone()
    {
        return $this->belongsTo('App\Models\Zone');
    }

    public function packages(){
       return $this->hasMany('App\Models\Package','id','package_id');
   }
   public function shipping_methods(){
       return $this->hasMany('App\Models\Admin\ShippingMethod','id','shipping_method_id');
   }
   public function currencies(){
       return $this->hasone('App\Models\Currency','id','currency_id');
   }
}
