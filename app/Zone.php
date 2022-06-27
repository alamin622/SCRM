<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    public function division(){
        return $this->belongsTo('App\Division');
    }
    public function areas()
    {
        return $this->hasMany('App\Area');
    }

}
