<?php

namespace App\Models;

use App\Models\Element;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'imagen',
        'user_id'
    ];

    //Relacion con el usuario ya que solo puede haber uno por cada post
    public function user(){
        return $this->belongsTo(User::class)->select(['name', 'email']);
    }

    public function element(){
        return $this->hasMany(Element::class);
    }
}
