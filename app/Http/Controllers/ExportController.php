<?php

namespace App\Http\Controllers;

use App\Exports\ViewExport;
use App\Models\Apprenant;
use App\Models\Filiere;
use App\Models\Note;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

class ExportController extends Controller
{
    public function apprenantsExcel(): BinaryFileResponse
    {
        return Excel::download(
            new ViewExport('exports.apprenants-table', [
                'apprenants' => Apprenant::query()->with('filiere')->orderBy('nom')->get(),
            ]),
            'apprenants.xlsx',
        );
    }

    public function filieresExcel(): BinaryFileResponse
    {
        return Excel::download(
            new ViewExport('exports.filieres-table', [
                'filieres' => Filiere::query()->withCount('apprenants')->orderBy('nom')->get(),
            ]),
            'filieres.xlsx',
        );
    }

    public function notesExcel(): BinaryFileResponse
    {
        return Excel::download(
            new ViewExport('exports.notes-table', [
                'notes' => Note::query()->with(['apprenant.filiere'])->latest()->get(),
            ]),
            'notes.xlsx',
        );
    }

    public function apprenantsPdf(): Response
    {
        return Pdf::loadView('exports.pdf', [
            'title' => 'Liste des apprenants',
            'view' => 'exports.apprenants-table',
            'data' => ['apprenants' => Apprenant::query()->with('filiere')->orderBy('nom')->get()],
        ])->download('apprenants.pdf');
    }

    public function filieresPdf(): Response
    {
        return Pdf::loadView('exports.pdf', [
            'title' => 'Liste des filieres',
            'view' => 'exports.filieres-table',
            'data' => ['filieres' => Filiere::query()->withCount('apprenants')->orderBy('nom')->get()],
        ])->download('filieres.pdf');
    }

    public function notesPdf(): Response
    {
        return Pdf::loadView('exports.pdf', [
            'title' => 'Liste des notes',
            'view' => 'exports.notes-table',
            'data' => ['notes' => Note::query()->with(['apprenant.filiere'])->latest()->get()],
        ])->download('notes.pdf');
    }
}
