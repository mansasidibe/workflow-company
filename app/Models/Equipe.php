<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'chef',
        // 'membre_id',
    ];

    public function membres()
    {
        return $this->hasMany(Membre::class);
    }
}
