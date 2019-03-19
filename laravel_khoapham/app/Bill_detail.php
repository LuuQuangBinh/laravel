<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    //
    protected $table = 'bill_detail';

    function product()
    {
        return $this->belongsTo('App\Product', 'id_product', 'id');
    }
}
