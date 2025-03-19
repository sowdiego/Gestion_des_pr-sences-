<?php

namespace App\Http\Controllers;

use App\Models\Emargement;


class DashboardController extends Controller
{
    public function index()
    {
        // Vérifier que le modèle User est bien utilisé pour les professeurs
        $stats = Emargement::selectRaw('professeur_id, COUNT(*) as total')
            ->groupBy('professeur_id')
            ->with('professeur')
            ->get();

        // Vérifier si les données existent
        if ($stats->isEmpty()) {
            return view('dashboard')->with('message', 'Aucune donnée disponible.');
        }

        // Transformer les données pour l'affichage
        $professeurs = $stats->map(function ($stat) {
            return [
                'nom' => optional($stat->professeur)->nom . ' ' . optional($stat->professeur)->prenom,
                'total' => $stat->total,
            ];
        });

        return view('dashboard', compact('professeurs'));
    }
}
