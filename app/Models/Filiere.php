<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filiere extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'duree',
    ];

    public function apprenants(): HasMany
    {
        return $this->hasMany(Apprenant::class);
    }
}
