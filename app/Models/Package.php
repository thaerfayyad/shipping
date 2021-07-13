<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;

    protected $table = 'packages';

    protected $fillable = ['company_id','name_ar','name_en','length','width','height','weight','type_ar','type_en'];
}
