<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function membres()
    {
        return $this->hasMany(Membre::class);
    }

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }
}
