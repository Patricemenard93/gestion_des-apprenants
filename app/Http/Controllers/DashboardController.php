<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use App\Models\Filiere;
use App\Models\Note;
use App\Services\ApprenantStatsService;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function __invoke(ApprenantStatsService $statsService)
    {
        $latestApprenants = Apprenant::query()
            ->with(['filiere', 'notes'])
            ->latest('date_inscription')
            ->take(5)
            ->get();

        $apprenants = Apprenant::query()->with('notes')->get();

        $averageOfAverages = $apprenants->isEmpty()
            ? 0
            : round($apprenants->avg(fn (Apprenant $apprenant) => $statsService->moyenneGenerale($apprenant)), 2);

        $admissionStats = $apprenants
            ->groupBy(fn (Apprenant $apprenant) => $statsService->decision($apprenant))
            ->map->count();

        $inscriptionStats = $apprenants
            ->groupBy(fn (Apprenant $apprenant) => Carbon::parse($apprenant->date_inscription)->format('Y-m'))
            ->map(fn ($items, $period) => ['periode' => $period, 'total' => $items->count()])
            ->sortBy('periode')
            ->values();

        return view('dashboard', [
            'filieresChart' => Filiere::query()
                ->withCount('apprenants')
                ->orderBy('nom')
                ->get(),
            'stats' => [
                'apprenants' => Apprenant::query()->count(),
                'filieres' => Filiere::query()->count(),
                'notes' => Note::query()->count(),
                'moyenne_generale' => $averageOfAverages,
            ],
            'latestApprenants' => $latestApprenants,
            'chartData' => [
                'apprenantsParFiliere' => [
                    'labels' => Filiere::query()->withCount('apprenants')->orderBy('nom')->pluck('nom')->all(),
                    'values' => Filiere::query()->withCount('apprenants')->orderBy('nom')->pluck('apprenants_count')->all(),
                ],
                'admissions' => [
                    'labels' => $admissionStats->keys()->values()->all(),
                    'values' => $admissionStats->values()->all(),
                ],
                'inscriptions' => [
                    'labels' => $inscriptionStats->pluck('periode')->all(),
                    'values' => $inscriptionStats->pluck('total')->all(),
                ],
            ],
        ]);
    }
}
