<?php

namespace App;

use App\Models\Admin\Service;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable =[
        'user_id', 'service_id','status'
    ];
    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function service(){
        return $this->belongsTo(Service::class , 'service_id' , 'id');
    }
}
