<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    protected $table = 'horarios';
    
    protected $fillable = ['nombre'];
    
    public function Grupos(){
        return $this->hasMany('App\Grupos');
    }
}