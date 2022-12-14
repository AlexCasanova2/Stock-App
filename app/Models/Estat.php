<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function elements()
    {
        return $this->hasMany(Element::class, 'elements_id');
    }
}
