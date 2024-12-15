<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function pets(){
        return $this->hasMany(Pet::class);
    }
    public function owner():BelongsTo{
        return $this->belongsTo(User::class,'owner_id');
    }
}
