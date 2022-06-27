<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    public function zones()
    {
        return $this->hasMany('App\Zone');
    }

}
