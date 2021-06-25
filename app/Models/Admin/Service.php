<?php

namespace App\Models\Admin;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = [
        'image','service_title', 'service_desc', 'price', 'cat_id'
    ];

public function category(){
        return $this->belongsTo(Category::class,'cat_id','id');   
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
}
