<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $fillable = ['name' , 'email' , 'phone' , 'hospital_id'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class , 'hospital_id' , 'id');
    }
}
