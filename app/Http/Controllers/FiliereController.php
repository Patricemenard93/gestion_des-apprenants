<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFiliereRequest;
use App\Http\Requests\UpdateFiliereRequest;
use App\Models\Filiere;
use App\Support\SendsSystemNotifications;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FiliereController extends Controller
{
    use SendsSystemNotifications;

    public function index(): View
    {
        return view('filieres.index', [
            'filieres' => Filiere::query()
                ->withCount('apprenants')
                ->latest()
                ->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('filieres.create');
    }

    public function store(StoreFiliereRequest $request): RedirectResponse
    {
        $filiere = Filiere::query()->create($request->validated());

        $this->notifyUsers(
            'Nouvelle filiere',
            "La filiere {$filiere->nom} a ete creee.",
            'success',
            route('filieres.show', $filiere),
        );

        return redirect()
            ->route('filieres.index')
            ->with('success', 'La filiere a ete enregistree avec succes.');
    }

    public function show(Filiere $filiere): View
    {
        $filiere->load(['apprenants' => fn ($query) => $query->latest()->take(8)]);

        return view('filieres.show', compact('filiere'));
    }

    public function edit(Filiere $filiere): View
    {
        return view('filieres.edit', compact('filiere'));
    }

    public function update(UpdateFiliereRequest $request, Filiere $filiere): RedirectResponse
    {
        $filiere->update($request->validated());

        return redirect()
            ->route('filieres.show', $filiere)
            ->with('success', 'La filiere a ete mise a jour.');
    }

    public function destroy(Filiere $filiere): RedirectResponse
    {
        if ($filiere->apprenants()->exists()) {
            return back()->with('error', 'Impossible de supprimer une filiere contenant des apprenants.');
        }

        $nom = $filiere->nom;
        $filiere->delete();

        return redirect()
            ->route('filieres.index')
            ->with('success', "La filiere {$nom} a ete supprimee.");
    }
}
