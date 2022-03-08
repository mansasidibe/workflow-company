<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

     protected $fillable = [
       'libelle',
       'duree',
       'etat',
       'projet_id',
       'executand_id',
       'equipe_id',
    ];

    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }
}
