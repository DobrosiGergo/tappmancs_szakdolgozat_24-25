<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $hidden = [
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function pet(){
        return $this->belongsTo(Pet::class);
    }
}
