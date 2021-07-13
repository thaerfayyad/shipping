<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    public function order(){
        return $this->belongsTo(Order::class ,'order_id');
    }


}
