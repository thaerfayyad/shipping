<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    public function children()
    {
        return $this->hasMany(__CLASS__, 'parent_id', 'id');
    }
}
