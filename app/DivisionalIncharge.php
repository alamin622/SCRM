<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DivisionalIncharge extends Model
{
    protected $guarded = ['created_at', 'updated_at'];

    public function type(){
        return $this->belongsTo('App\Type');
    }
    public function division(){
        return $this->belongsTo('App\Division');
    }
    public function zone(){
        return $this->belongsTo('App\Zone');
    }
    public function area(){
        return $this->belongsTo('App\Area');
    }
    public function user(){
        return $this->hasMany('App\User');
    }
}
