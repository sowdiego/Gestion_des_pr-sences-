@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Liste des cours</h2>
        <a href="{{ route('cours.create') }}" class="btn btn-primary">Ajouter un cours</a>
        <table class="table mt-3">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Heure</th>
                <th>Salle</th>
                <th>Professeur</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cours as $c)
                <tr>
                    <td>{{ $c->nom }}</td>
                    <td>{{ $c->description }}</td>
                    <td>{{ $c->heure_debut }} - {{ $c->heure_fin }}</td>
                    <td>{{ $c->salle->libelle }}</td>
                    <td>{{ $c->professeur->nom }} {{ $c->professeur->prenom }}</td>
                    <td>
{{--                        <a href="{{ route('cours.edit', $c) }}" class="btn btn-warning">Modifier</a>--}}
                        <a href="{{ route('cours.edit', $c->id) }}" class="btn btn-warning">Modifier</a>


                        <form action="{{ route('cours.destroy', $c) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
