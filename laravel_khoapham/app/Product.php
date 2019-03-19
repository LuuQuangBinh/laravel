<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    function pageUrlProduct()
    {
        return $this->belongsTo('App\PageUrl', 'id_url', 'id'); // id này gọi là other key
    }

    function bills()
    {
        return $this->belongsToMany('App\Product', 'bill_detail', 'id_product', 'id_bill');
    }
}
