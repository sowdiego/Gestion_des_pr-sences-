@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Ajouter un cours</h2>
        <form action="{{ route('cours.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Heure de début</label>
                <input type="time" name="heure_debut" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Heure de fin</label>
                <input type="time" name="heure_fin" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Salle</label>
                <select name="salle_id" class="form-control">
                    @foreach($salles as $salle)
                        <option value="{{ $salle->id }}">{{ $salle->libelle }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Professeur</label>
                <select name="professeur_id" class="form-control">
                    @foreach($professeurs as $prof)
                        <option value="{{ $prof->id }}">{{ $prof->nom }} {{ $prof->prenom }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
        </form>
    </div>
@endsection
