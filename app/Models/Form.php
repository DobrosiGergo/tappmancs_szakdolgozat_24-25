<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'form_messages';
    protected $fillable = [
        'subject',
        'message',        
    ];
   
      /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = ['user_id',];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function shelter(){
        return $this->belongsTo(Shelter::class);
    }
    public function pet(){
        return $this->belongsTo(Pet::class,'pet_id');
    }
}
