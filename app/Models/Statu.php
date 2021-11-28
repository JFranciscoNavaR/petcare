<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];
    
    public function pets(){
        return $this->hasMany('App\Models\Pet');
    }

    public function dates(){
        return $this->hasMany('App\Models\Date');
    }
}
