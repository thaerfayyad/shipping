<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model
{
    use SoftDeletes;

    protected $table = 'zones';

    protected $fillable = ['name_ar','name_en','company_id'];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function zones_countries()
    {
        return $this->hasMany('App\Models\Zone_Country');
    }

    public function zones_prices()
    {
        return $this->hasMany('App\Models\ZonePrice','zone_id','ZonePriceID');
    }
}
