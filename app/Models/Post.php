<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    //Relacion con el usuario ya que solo puede haber uno por cada post
    public function user(){
        return $this->belongsTo(User::class)->select(['name', 'email']);
    }
    
}
