<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'element_id',
        'comentario'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comentado(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
