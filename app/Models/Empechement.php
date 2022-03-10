<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empechement extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'file',
        'raison',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
