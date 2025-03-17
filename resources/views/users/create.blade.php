@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Ajouter un utilisateur</h2>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="prenom" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Rôle</label>
                <select name="role" class="form-control" required>
                    <option value="admin">Administrateur</option>
                    <option value="professeur">Professeur</option>
                    <option value="gestionnaire">Gestionnaire</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
        </form>
    </div>
@endsection
