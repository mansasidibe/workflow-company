<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

     protected $fillable = [
        'nom',
        'date_debut',
        'duree',
        'equipe_id',
        'etat',
    ];
}
