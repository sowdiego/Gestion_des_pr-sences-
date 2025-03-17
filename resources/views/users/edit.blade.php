@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Modifier l'utilisateur</h2>
        <form action="{{ route('cours.update', $cours->id) }}" method="POST">

            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" value="{{ $user->nom }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="prenom" value="{{ $user->prenom }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Rôle</label>
                <select name="role" class="form-control" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                    <option value="professeur" {{ $user->role == 'professeur' ? 'selected' : '' }}>Professeur</option>
                    <option value="gestionnaire" {{ $user->role == 'gestionnaire' ? 'selected' : '' }}>Gestionnaire</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
        </form>
    </div>
@endsection
