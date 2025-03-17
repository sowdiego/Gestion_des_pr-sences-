@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Modifier l'utilisateur</h2>


<form action="{{ route('cours.update', $cours->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control" value="{{ old('nom', $cours->nom) }}" required>
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description', $cours->description) }}</textarea>
    </div>

    <div class="form-group">
        <label>Heure de début</label>
        <input type="time" name="heure_debut" class="form-control" value="{{ old('heure_debut', $cours->heure_debut) }}" required>
    </div>

    <div class="form-group">
        <label>Heure de fin</label>
        <input type="time" name="heure_fin" class="form-control" value="{{ old('heure_fin', $cours->heure_fin) }}" required>
    </div>

    <div class="form-group">
        <label>Salle</label>
        <select name="salle_id" class="form-control">
            @foreach($salles as $salle)
                <option value="{{ $salle->id }}" {{ $cours->salle_id == $salle->id ? 'selected' : '' }}>
                    {{ $salle->libelle }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Professeur</label>
        <select name="professeur_id" class="form-control">
            @foreach($professeurs as $prof)
                <option value="{{ $prof->id }}" {{ $cours->professeur_id == $prof->id ? 'selected' : '' }}>
                    {{ $prof->nom }} {{ $prof->prenom }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
</form>
    </div>
@endsection
