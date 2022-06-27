<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model


{

    use Notifiable;

    protected $fillable = [
        'emp_id','user_id','phone','present_address','permanent_address','image','shop_name',
        'nid_number','nid_image','shop_image','religion','birthdate','marriage_dob','family_member',
        'father_name','mother_name','occupation','business_year','number_of_children','children_dob','division_id',
        'zone_id','area_id'
    ];

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
        return $this->belongsTo('App\User');
    }

    public function attachments()
    {
        return $this->morphMany('App\Attachment', 'attachable');

    }
    public function sales_incharges()
    {
        return $this->hasMany('App\SaleIncharge');
    }




}
