<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    //
    protected $fillable = ['name' , 'address' , 'phone'];

    protected $casts = ['created_at' . 'updated_at'];

    public function doctor()
    {
        return $this->hasMany(Doctor::class , 'hospital_id' , 'id');
    }
}
