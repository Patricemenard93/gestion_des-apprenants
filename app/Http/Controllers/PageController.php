<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use App\Models\Filiere;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome', [
            'isAuthenticated' => Auth::check(),
            'filieres' => Filiere::withCount('apprenants')->orderBy('nom')->get(),
            'totalApprenants' => Apprenant::count(),
            'totalFilieres' => Filiere::count(),
        ]);
    }

    public function formations()
    {
        return view('pages.formations', [
            'isAuthenticated' => Auth::check(),
            'filieres' => Filiere::withCount('apprenants')->orderBy('nom')->get(),
        ]);
    }

    public function about()
    {
        return view('pages.about', [
            'isAuthenticated' => Auth::check(),
            'totalApprenants' => Apprenant::count(),
            'totalFilieres' => Filiere::count(),
            'totalNotes' => Note::count(),
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'isAuthenticated' => Auth::check(),
        ]);
    }
}
