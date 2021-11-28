<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'edad', 'sexo', 'peso', 'color', 'raza', 'especie', 'descripcion', 'image', 'type_id', 'statu_id', 'user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function statu(){
        return $this->belongsTo('App\Models\Statu');
    }
    public function type(){
        return $this->belongsTo('App\Models\Type');
    }
}
