<?php

namespace App\Services;

use App\Models\Apprenant;

class ApprenantStatsService
{
    public function totalCoefficients(Apprenant $apprenant): int
    {
        return (int) $apprenant->notes->sum('coefficient');
    }

    public function moyenneGenerale(Apprenant $apprenant): float
    {
        $weightedTotal = $apprenant->notes->sum(
            fn ($note) => (float) $note->note * (int) $note->coefficient,
        );

        $totalCoefficients = $this->totalCoefficients($apprenant);

        if ($totalCoefficients === 0) {
            return 0.0;
        }

        return round($weightedTotal / $totalCoefficients, 2);
    }

    public function decision(Apprenant $apprenant): string
    {
        return $this->moyenneGenerale($apprenant) >= 10 ? 'Admis' : 'Ajourne';
    }
}
