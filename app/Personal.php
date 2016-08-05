<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;

class Personal extends Model{
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    protected $table = 'personal';
    
    protected $fillable = ['nombre'];
    
    public function grupo(){
        return $this->belongsTo('App\Grupos');
    }
}