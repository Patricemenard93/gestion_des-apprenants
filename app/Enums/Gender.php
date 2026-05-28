<?php

namespace App\Enums;

enum Gender: string
{
    case Masculin = 'masculin';
    case Feminin = 'feminin';

    public function label(): string
    {
        return match ($this) {
            self::Masculin => 'Masculin',
            self::Feminin => 'Feminin',
        };
    }
}
