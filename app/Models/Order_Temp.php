<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_Temp extends Model
{
    use SoftDeletes;

    protected $table = 'orders_temp';

    protected $fillable = ['order_number','pay_status','shipping_status','UserID','CompanyID','PackageID','Shipping_method_id','price','price_commission','send_date','delivered_date','country_from','country_to','payment_method_id','bank_id'];

   
}
