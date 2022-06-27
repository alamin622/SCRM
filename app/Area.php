<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    protected $table = 'areas';
    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    public function division(){
        return $this->belongsTo('App\Division');
    }

    public function zone(){
        return $this->belongsTo('App\Zone');
    }
    public function customers()
    {
        return $this->hasMany('App\Customer');
    }

}
