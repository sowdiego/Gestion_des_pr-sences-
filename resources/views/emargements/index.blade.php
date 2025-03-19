@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Historique des présences</h2>

        <!-- Formulaire de filtrage -->
        <form action="{{ route('emargements.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label>Date de début</label>
                    <input type="date" name="date_debut" class="form-control" value="{{ request('date_debut') }}">
                </div>
                <div class="col-md-4">
                    <label>Date de fin</label>
                    <input type="date" name="date_fin" class="form-control" value="{{ request('date_fin') }}">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filtrer</button>
                </div>
            </div>
        </form>

        <!-- Boutons d'exportation -->
        <div class="mb-3">
            <a href="{{ route('emargements.export', ['format' => 'pdf'] + request()->query()) }}" class="btn btn-danger">Exporter en PDF</a>
            <a href="{{ route('emargements.exportExel', ['format' => 'excel'] + request()->query()) }}" class="btn btn-success">Exporter en Excel</a>
        </div>

        <!-- Tableau des présences -->
        <table class="table">
            <thead>
            <tr>
                <th>Professeur</th>
                <th>Cours</th>
                <th>Date</th>
                <th>Statut</th>
            </tr>
            </thead>
            <tbody>
            @foreach($emargements as $emargement)
                <tr>
                    <td>{{ $emargement->professeur->nom }} {{ $emargement->professeur->prenom }}</td>
                    <td>{{ $emargement->cours->nom }}</td>
                    <td>{{ $emargement->date }}</td>
                    <td>{{ $emargement->statut }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
