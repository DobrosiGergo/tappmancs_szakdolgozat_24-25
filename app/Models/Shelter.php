<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shelter extends Model
{
    protected $table = 'shelter';

    protected $casts =[
        'images' => 'array'
    ];
    protected $fillable = [
        'name',
        'content',
        'images'
    ];
    protected $hidden =[
        'owner_id'
    ];
    protected $attributes=[
        'images' => []
    ];
}
