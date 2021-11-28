<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'tiempo', 'descripcion', 'statu_id', 'user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    public function statu(){
        return $this->belongsTo('App\Models\Statu');
    }
}
