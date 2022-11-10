<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }

    public function formularios()
    {
        return $this->hasMany(Formulario::class);
    }
}
