<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $hidden =[
        'user_id',
    ];
   
    protected $fillable = [
        'content',
    ];
    public function pet(){
        return $this->belongsTo(Pet::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
