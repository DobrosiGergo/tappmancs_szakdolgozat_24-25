<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;
    protected $table = 'breeds';

    protected $fillable= ['name'];
    public $timestapms = false;
    public function pets(){
        return $this->hasMany(Pet::class);
    }

}
