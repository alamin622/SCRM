<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];
    public function customer(){
        return $this->belongsTo('App\Customer');
    }

}
