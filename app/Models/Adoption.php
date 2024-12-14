<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    protected $table = 'adpotions';
    protected $hidden =[
        'user_id'
    ];
}
