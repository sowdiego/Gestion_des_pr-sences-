@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Enregistrer la présence</h2>

        <form action="{{ route('emargements.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="cours_id">Cours</label>
                <select name="cours_id" id="cours_id" class="form-control" required>
                    @foreach($cours as $cours)
                        <option value="{{ $cours->id }}">{{ $cours->nom }} - {{ $cours->heure_debut }} - {{ $cours->heure_fin }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="professeur_id">Professeur</label>
                <select name="professeur_id" id="professeur_id" class="form-control" required>
                    @foreach($professeurs as $professeur)
                        <option value="{{ $professeur->id }}">{{ $professeur->nom }} {{ $professeur->prenom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="statut">Statut</label>
                <select name="statut" id="statut" class="form-control" required>
                    <option value="présent">Présent</option>
                    <option value="absent">Absent</option>
                    <option value="justifié">Justifié</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
