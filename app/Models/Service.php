<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $table = 'service';

    protected $fillable = ['title','label','des_ar','des_en','img'];


}
