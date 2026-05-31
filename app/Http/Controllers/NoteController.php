<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Apprenant;
use App\Models\Note;
use App\Services\ApprenantStatsService;
use App\Support\SendsSystemNotifications;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoteController extends Controller
{
    use SendsSystemNotifications;

    public function index(Request $request): View
    {
        $apprenantId = $request->string('apprenant')->value();

        return view('notes.index', [
            'notes' => Note::query()
                ->with(['apprenant.filiere'])
                ->when($apprenantId, fn ($query) => $query->where('apprenant_id', $apprenantId))
                ->latest()
                ->paginate(10)
                ->withQueryString(),
            'apprenants' => Apprenant::query()->orderBy('nom')->orderBy('prenom')->get(),
            'selectedApprenant' => $apprenantId,
        ]);
    }

    public function create(Request $request): View
    {
        return view('notes.create', [
            'apprenants' => Apprenant::query()->orderBy('nom')->orderBy('prenom')->get(),
            'selectedApprenant' => $request->integer('apprenant_id'),
        ]);
    }

    public function store(StoreNoteRequest $request): RedirectResponse
    {
        $note = Note::query()->create($request->validated());
        $note->load('apprenant');

        $this->notifyUsers(
            'Nouvelle note',
            "Une note a été ajoutée pour {$note->apprenant->nom_complet}.",
            'success',
            route('notes.show', $note),
        );

        return redirect()
            ->route('notes.index')
            ->with('success', 'La note a été enregistrée.');
    }

    public function show(Note $note, ApprenantStatsService $statsService): View
    {
        $note->load(['apprenant.filiere', 'apprenant.notes']);

        return view('notes.show', [
            'note' => $note,
            'stats' => [
                'moyenne' => $statsService->moyenneGenerale($note->apprenant),
                'coefficients' => $statsService->totalCoefficients($note->apprenant),
                'decision' => $statsService->decision($note->apprenant),
            ],
        ]);
    }

    public function edit(Note $note): View
    {
        return view('notes.edit', [
            'note' => $note,
            'apprenants' => Apprenant::query()->orderBy('nom')->orderBy('prenom')->get(),
        ]);
    }

    public function update(UpdateNoteRequest $request, Note $note): RedirectResponse
    {
        $note->update($request->validated());
        $note->load('apprenant');

        $this->notifyUsers(
            'Modification note',
            "La note de {$note->apprenant->nom_complet} a été modifiée.",
            'info',
            route('notes.show', $note),
        );

        return redirect()
            ->route('notes.show', $note)
            ->with('success', 'La note a été mise à jour.');
    }

    public function destroy(Note $note): RedirectResponse
    {
        $apprenantName = $note->apprenant->nom_complet;
        $module = $note->module;
        $note->delete();

        $this->notifyUsers(
            'Suppression note',
            "La note de {$apprenantName} ({$module}) a été supprimée.",
            'warning',
        );

        return redirect()
            ->route('notes.index')
            ->with('success', "La note de {$apprenantName} a été supprimée.");
    }
}
