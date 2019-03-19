<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = 'bills';

    function products()
    {
        return $this->belongsToMany('App\Product', 'bill_detail', 'id_bill', 'id_product');
    }

    function billDetail()
    {
        return $this->hasMany('App\Bill_detail', 'id_bill', 'id');
    }

    function customer()
    {
        return $this->belongsTo('App\Bill', 'id_customer', 'id');
    }
}
