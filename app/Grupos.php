<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    protected $table = 'personal_grupos';
    
    protected $fillable = ['nombre'];
    
    public function personales(){
        return $this->hasMany('App\Personal');
    }
    
    public function Horarios(){
        return $this->belongsTo('App\Horarios');
    }

}