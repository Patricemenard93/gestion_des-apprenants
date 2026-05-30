<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApprenantRequest;
use App\Http\Requests\UpdateApprenantRequest;
use App\Models\Apprenant;
use App\Models\Filiere;
use App\Services\ApprenantStatsService;
use App\Support\SendsSystemNotifications;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ApprenantController extends Controller
{
    use SendsSystemNotifications;

    public function index(Request $request): View
    {
        $filiereId = $request->string('filiere')->value();
        $search = $request->string('search')->value();

        return view('apprenants.index', [
            'apprenants' => Apprenant::query()
                ->with('filiere')
                ->search($search)
                ->when($filiereId, fn ($query) => $query->where('filiere_id', $filiereId))
                ->latest()
                ->paginate(10)
                ->withQueryString(),
            'filieres' => Filiere::query()->orderBy('nom')->get(),
            'filters' => ['search' => $search, 'filiere' => $filiereId],
        ]);
    }

    public function create(): View
    {
        return view('apprenants.create', [
            'filieres' => Filiere::query()->orderBy('nom')->get(),
        ]);
    }

    public function store(StoreApprenantRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['photo'] = $request->file('photo')->store('photos', 'public');

        $apprenant = Apprenant::query()->create($data);

        $this->notifyUsers(
            'Nouvel apprenant',
            "L'apprenant {$apprenant->nom_complet} a été ajouté.",
            'success',
            route('apprenants.show', $apprenant),
        );

        return redirect()
            ->route('apprenants.index')
            ->with('success', "L'apprenant a été enregistré avec succès.");
    }

    public function show(Apprenant $apprenant, ApprenantStatsService $statsService): View
    {
        $apprenant->load(['filiere', 'notes']);

        return view('apprenants.show', [
            'apprenant' => $apprenant,
            'stats' => [
                'moyenne' => $statsService->moyenneGenerale($apprenant),
                'coefficients' => $statsService->totalCoefficients($apprenant),
                'decision' => $statsService->decision($apprenant),
            ],
        ]);
    }

    public function edit(Apprenant $apprenant): View
    {
        return view('apprenants.edit', [
            'apprenant' => $apprenant,
            'filieres' => Filiere::query()->orderBy('nom')->get(),
        ]);
    }

    public function update(UpdateApprenantRequest $request, Apprenant $apprenant): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($apprenant->photo !== 'photos/default-avatar.svg') {
                Storage::disk('public')->delete($apprenant->photo);
            }

            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $apprenant->update($data);

        return redirect()
            ->route('apprenants.show', $apprenant)
            ->with('success', "Les informations de l'apprenant ont été mises à jour.");
    }

    public function destroy(Apprenant $apprenant): RedirectResponse
    {
        $name = $apprenant->nom_complet;

        if ($apprenant->photo !== 'photos/default-avatar.svg') {
            Storage::disk('public')->delete($apprenant->photo);
        }

        $apprenant->delete();

        $this->notifyUsers(
            'Suppression apprenant',
            "L'apprenant {$name} a été supprimé.",
            'warning',
        );

        return redirect()
            ->route('apprenants.index')
            ->with('success', "L'apprenant a été supprimé.");
    }
}
