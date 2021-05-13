<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Jobapp extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'address',
        'phoneno',
        'age',
        'experience'
    ];
}
