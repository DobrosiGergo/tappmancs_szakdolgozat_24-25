<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{

    protected $table = "pets";
    protected $fillable = [
        'name',
        'slug',
        'age',
        'breed_id',
        'status',
        'description',
        'images',
        'species_id'       
    ];
    protected function casts(){
        return [
            'arrival_date' => 'datetime',
        ];
    }
      /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = ['employee_id'];
    protected $attributes =[
        'status' => 'Free',
        'images' => []
    ];
}
