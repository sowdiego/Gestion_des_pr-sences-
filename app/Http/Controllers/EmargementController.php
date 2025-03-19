<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Emargement;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmargementsExport;

class EmargementController extends Controller
{

//    public function index()
//    {
//        $emargements = Emargement::with('cours', 'professeur')
//            ->orderBy('date', 'desc')
//            ->get();
//
//        return view('emargements.index', compact('emargements'));
//    }
    public function index(Request $request)
    {
        $query = Emargement::query();

        // Filtrer par date si fourni
        if ($request->filled('date_debut') && $request->filled('date_fin')) {
            $query->whereBetween('date', [$request->date_debut, $request->date_fin]);
        }

        $emargements = $query->with(['professeur', 'cours'])->get();

        return view('emargements.index', compact('emargements'));
    }

    public function create()
    {
        // Récupérer tous les cours et professeurs
        $cours = Cours::all();
        $professeurs = User::where('role', 'professeur')->get();  // Assure-toi que 'role' existe dans la table users

        // Passer les données à la vue
        return view('emargements.create', compact('cours', 'professeurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cours_id' => 'required|exists:cours,id',
            'professeur_id' => 'required|exists:users,id',
            'statut' => 'required|in:présent,absent,justifié',
            'date' => 'required|date',
        ]);

        // Vérification de l'existence de l'émargement pour ce professeur et ce cours à cette date
        $existingEmargement = Emargement::where('professeur_id', $request->professeur_id)
            ->where('cours_id', $request->cours_id)
            ->where('date', $request->date)
            ->first();

        if ($existingEmargement) {
            return redirect()->back()->withErrors(['msg' => 'Présence déjà enregistrée pour ce cours à cette date.']);
        }

        Emargement::create([
            'cours_id' => $request->cours_id,
            'professeur_id' => $request->professeur_id,
            'statut' => $request->statut,
            'date' => $request->date,
        ]);

        return redirect()->route('emargements.index')->with('success', 'Présence enregistrée.');
    }

    // Vérification des conflits d'horaires pour le professeur
    public function checkConflict($professeur_id, $cours_id, $date)
    {
        $cours = Cours::find($cours_id);
        $professeur = User::find($professeur_id);

        // On vérifie si le professeur est déjà attribué à un autre cours à la même date et heure
        $conflictCours = Cours::where('id', '!=', $cours_id)
            ->where('heure_debut', '<=', $cours->heure_fin)
            ->where('heure_fin', '>=', $cours->heure_debut)
            ->whereHas('professeur', function ($query) use ($professeur) {
                $query->where('professeur_id', $professeur->id);
            })
            ->whereDate('date', $date)
            ->exists();

        return $conflictCours;
    }


    public function export(Request $request, $format)
    {
        $query = Emargement::query();

        if ($request->filled('date_debut') && $request->filled('date_fin')) {
            $query->whereBetween('date', [$request->date_debut, $request->date_fin]);
        }

        $emargements = $query->with(['professeur', 'cours'])->get();

        if ($format === 'pdf') {
            $pdf = Pdf::loadView('emargements.export_pdf', compact('emargements'));
            return $pdf->download('historique_presences.pdf');
        }

        return redirect()->route('emargements.index');
    }

    public function exportExel(Request $request, $format)
    {
        $query = Emargement::query();

        if ($request->filled('date_debut') && $request->filled('date_fin')) {
            $query->whereBetween('date', [$request->date_debut, $request->date_fin]);
        }

        $emargements = $query->with(['professeur', 'cours'])->get();

        if ($format === 'pdf') {
            $pdf = Pdf::loadView('emargements.export_pdf', compact('emargements'));
            return $pdf->download('historique_presences.pdf');
        }

        if ($format === 'excel') {
            return Excel::download(new EmargementsExport($request), 'historique_presences.xlsx');
        }

        return redirect()->route('emargements.index');
    }


}
