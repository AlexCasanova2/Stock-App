<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'imagen',
        'stock',
        'estat',
        'ample',
        'llarg',
        'alçada',
        'adquisicio',
        'proveidor_id',
        'client_id',
        'area_id',
        'user_id'
    ];

    //Relacion con el usuario ya que solo puede haber uno por cada post
    public function user(){
        return $this->belongsTo(User::class)->select(['name', 'email']);
    }

    public function area(){
        
    }
}
