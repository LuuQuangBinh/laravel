<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'role';

    function users()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'role_id', 'user_id');
    }
}
