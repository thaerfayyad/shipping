<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone_Country extends Model
{

    use SoftDeletes;

    protected $table = 'zones_countries';

    protected $fillable = ['zone_id','country_id_from','country_id_to','company_id','city_id'];

   public function zones(){
       return $this->belongsTo('App\Models\Zone','zone_id','id');
   }

    public function zones1(){
       return $this->hasMany('App\Models\Zone','id','zone_id');
   }
    public function countries(){
        return $this->belongTo('App\Models\Country','country_id','id');
    }
    public function cities(){
        return $this->belongTo('App\Models\City','city_id','id');
    }
     public function countries_from(){
        return $this->hasMany('App\Models\Country','id','country_id_from');
    }
    public function countries_to(){
        return $this->hasMany('App\Models\Country','id','country_id_to');
    }
}
