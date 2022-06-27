<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Image extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'employee_id',
    ];

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
