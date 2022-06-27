<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use Notifiable;
    protected $fillable = [
        'cus_id','phone','present_address','permanent_address','image','shop_name','name','email','nickname','category','type_id',
        'nid_number','nid_image','shop_image','religion','birthdate','marriage_dob','family_member',
        'father_name','mother_name','occupation','business_year','number_of_children','children_dob','division_id',
        'zone_id','area_id'
    ];


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

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function attachments()
    {
        return $this->morphMany('App\Attachment', 'attachable');
    }

    public function types()
    {
        return $this->hasMany('App\Type');
    }









    /*public function divisions(){
        return $this->hasMany('App\Division');
    }
    public function zones(){
        return $this->hasMany('App\Zone');
    }
    public function areas(){
        return $this->hasMany('App\Area');
    }*/


}
