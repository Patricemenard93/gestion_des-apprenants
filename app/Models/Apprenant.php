<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Apprenant extends Model
{
    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'sexe',
        'date_naissance',
        'email',
        'telephone',
        'adresse',
        'photo',
        'date_inscription',
        'filiere_id',
    ];

    protected $appends = [
        'nom_complet',
        'photo_url',
    ];

    protected function casts(): array
    {
        return [
            'date_naissance' => 'date',
            'date_inscription' => 'date',
            'sexe' => Gender::class,
        ];
    }

    public function filiere(): BelongsTo
    {
        return $this->belongsTo(Filiere::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        if (! $term) {
            return $query;
        }

        return $query->where(function (Builder $builder) use ($term): void {
            $builder
                ->where('nom', 'like', "%{$term}%")
                ->orWhere('prenom', 'like', "%{$term}%")
                ->orWhere('matricule', 'like', "%{$term}%");
        });
    }

    public function getNomCompletAttribute(): string
    {
        return trim($this->prenom.' '.$this->nom);
    }

    public function getPhotoUrlAttribute(): string
    {
        return Storage::url($this->photo);
    }
}
