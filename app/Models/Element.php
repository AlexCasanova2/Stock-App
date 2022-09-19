<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Proveidor;
use App\Models\Comentario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Venturecraft\Revisionable\RevisionableTrait;

class Element extends Model
{
    use HasFactory;
    use RevisionableTrait;
    
    protected $dates = ['adquisicio'];

    protected $fillable = [
        'name',
        'description',
        'imagen',
        'stock',
        'estat',
        'caracteristiques',
        'tipus',
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
    public function proveidor(){
        return $this->belongsTo(Proveidor::class)->select(['id', 'name']);
    }
    public function area(){
        return $this->belongsTo(Area::class)->select(['id', 'name']);
    }
    public function client(){
        return $this->belongsTo(Client::class)->select(['id', 'name']);
    }
    public function roles(){
        return $this->belongsTo(Roles::class)->select(['id', 'name']);
    }
    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
