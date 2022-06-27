<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded =[];



    public function type(){
        return $this->belongsTo('App\Type');
    }
    public function attachments()
    {
        return $this->morphMany('App\Attachment', 'attachable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer');
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
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function customers()
    {
        return $this->hasMany('App\Customer');
    }


}
