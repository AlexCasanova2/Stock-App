<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveidor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    //Relacion con el usuario ya que solo puede haber uno por cada post
    public function user(){
        return $this->belongsTo(User::class)->select(['name', 'email']);
    }
}
