<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Liste des utilisateurs
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Formulaire d'ajout
    public function create()
    {
        return view('users.create');
    }

    // Enregistrement d'un utilisateur
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,professeur,gestionnaire'
        ]);

        User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur ajouté avec succès');
    }

    // Afficher un utilisateur
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Formulaire de modification
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Mise à jour d'un utilisateur
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,professeur,gestionnaire'
        ]);

        $user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'role' => $request->role
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès');
    }

    // Suppression d'un utilisateur
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}
