<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Salle;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\CoursAjouteMail;
use Illuminate\Support\Facades\Mail;

class CoursController extends Controller
{
    public function index()
    {
        $cours = Cours::with('salle', 'professeur')->get();
        return view('cours.index', compact('cours'));
    }

    public function create()
    {
        $salles = Salle::all();
        $professeurs = User::where('role', 'professeur')->get();
        return view('cours.create', compact('salles', 'professeurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'salle_id' => 'required|exists:salles,id',
            'professeur_id' => 'required|exists:users,id'
        ]);

        $cours = Cours::create($request->all());

        // Récupérer l'e-mail du professeur
        $professeurEmail = $cours->professeur->email;

        // Envoyer l'e-mail
        Mail::to($professeurEmail)->send(new CoursAjouteMail($cours));

        return redirect()->route('cours.index')->with('success', 'Cours ajouté avec succès.');
    }

    public function edit($id)
    {
        $cours = Cours::findOrFail($id);
        $salles = Salle::all();
        $professeurs = User::where('role', 'professeur')->get();
        return view('cours.edit', compact('cours', 'salles', 'professeurs'));
    }
   /* public function edit(Cours $cours)
    {
        $salles = Salle::all();
        $professeurs = User::where('role', 'professeur')->get();
        return view('cours.edit', compact('cours', 'salles', 'professeurs'));
    }*/

    public function update(Request $request, Cours $cours)
    {
       /* $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'salle_id' => 'required|exists:salles,id',
            'professeur_id' => 'required|exists:users,id'
        ]);*/

        // Ajouter un log pour vérifier les données envoyées
        error_log("request------".$request->nom);
        error_log("courss------".$cours);

        // Mise à jour du cours
        $cours->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'salle_id' => $request->salle_id,
            'professeur_id' => $request->professeur_id
        ]);

        // Vérifier si la mise à jour a réussi
        \Log::info('Cours mis à jour: ', $cours->toArray());

        return redirect()->route('cours.index')->with('success', 'Cours mis à jour avec succès.');
    }


    public function destroy(Cours $cours)
    {
        $cours->delete();
        return redirect()->route('cours.index')->with('success', 'Cours supprimé avec succès.');
    }
}
