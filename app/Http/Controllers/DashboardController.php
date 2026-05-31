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

        $filieres = Filiere::query()->withCount('apprenants')->orderBy('nom')->get();

        $topApprenants = $apprenants
            ->map(function (Apprenant $apprenant) use ($statsService) {
                $moyenne = $statsService->moyenneGenerale($apprenant);
                return [
                    'apprenant' => $apprenant,
                    'moyenne' => $moyenne,
                    'decision' => $statsService->decision($apprenant),
                ];
            })
            ->filter(fn ($item) => $item['apprenant']->notes->isNotEmpty())
            ->sortByDesc('moyenne')
            ->take(5)
            ->values();

        $genderStats = $apprenants->groupBy(fn ($a) => $a->sexe->value)->map->count();

        $recentNotes = Note::query()
            ->with(['apprenant.filiere'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', [
            'stats' => [
                'apprenants' => Apprenant::query()->count(),
                'filieres' => Filiere::query()->count(),
                'notes' => Note::query()->count(),
                'moyenne_generale' => $averageOfAverages,
            ],
            'latestApprenants' => $latestApprenants,
            'topApprenants' => $topApprenants,
            'recentNotes' => $recentNotes,
            'filieres' => $filieres,
            'genderStats' => $genderStats,
            'admissionStats' => $admissionStats,
            'chartData' => [
                'apprenantsParFiliere' => [
                    'labels' => $filieres->pluck('nom')->all(),
                    'values' => $filieres->pluck('apprenants_count')->all(),
                ],
                'admissions' => [
                    'labels' => $admissionStats->keys()->values()->all(),
                    'values' => $admissionStats->values()->all(),
                ],
                'inscriptions' => [
                    'labels' => $inscriptionStats->pluck('periode')->all(),
                    'values' => $inscriptionStats->pluck('total')->all(),
                ],
                'gender' => [
                    'labels' => $genderStats->keys()->values()->all(),
                    'values' => $genderStats->values()->all(),
                ],
            ],
        ]);
    }
}
