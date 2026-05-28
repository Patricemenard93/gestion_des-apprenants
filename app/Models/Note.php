<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    protected $fillable = [
        'apprenant_id',
        'module',
        'note',
        'coefficient',
    ];

    protected function casts(): array
    {
        return [
            'note' => 'decimal:2',
            'coefficient' => 'integer',
        ];
    }

    public function apprenant(): BelongsTo
    {
        return $this->belongsTo(Apprenant::class);
    }
}
