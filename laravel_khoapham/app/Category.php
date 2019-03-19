<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';

    function products()
    {
        return $this->hasMany('App\Product', 'id_type', 'id'); // id là local key
    }

    function billDetail()
    {
        return $this->hasManyThrough(
            'App\Bill_detail', 
            'App\Product', 
            'id_type', // khóa ngoại của model Product
            'id_product', // khóa ngoại của model Bill_detail
            'id', // khóa chính của model Category
            'id'  // khóa chính của sản phẩm của model Product
        ); 
    }

    function pageUrl()
    {
        return $this->belongsTo('App\PageUrl', 'id_url', 'id');
    }
}
