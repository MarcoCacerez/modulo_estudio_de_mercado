<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function encuestas()
    {
        return $this->hasMany(Poll::class);
    }

    public function conclusion()
    {
        return $this->hasOne(Conclusion::class);
    }

    public function conceptos()
    {
        return $this->hasMany(Concepto::class);
    }
}
