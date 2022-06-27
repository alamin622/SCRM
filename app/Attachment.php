<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = ['name','real_name','image','path','size','extension'];
    public function attachable()
    {
        return $this->morphTo();
    }



}
