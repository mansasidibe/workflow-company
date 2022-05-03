<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $guarded= [];


    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
