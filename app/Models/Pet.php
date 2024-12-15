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
    public function shelter(){
        return $this->belongsTo(Shelter::class);
    }
    public function species(){
        return $this->belongsTo(Specie::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function adoption(){
        return $this->hasOne(Adoption::class);
    }
    public function breed(){
        return $this->belongsTo(Breed::class);
    }
    public function empoloyee(){
        return $this->belongsTo(User::class,'employee_id');
    }
    public function formMessages(){
        return $this->hasMany(Form::class,'pet_id');
    }
    public function like(){
        return $this->hasMany(Like::class);
    }

}
