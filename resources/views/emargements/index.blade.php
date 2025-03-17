@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Historique des présences</h2>

        <table class="table">
            <thead>
            <tr>
                <th>Cours</th>
                <th>Professeur</th>
                <th>Date</th>
                <th>Statut</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($emargements as $emargement)
                <tr>
                    <td>{{ $emargement->cours->nom }}</td>
                    <td>{{ $emargement->professeur->nom }} {{ $emargement->professeur->prenom }}</td>
                    <td>{{ $emargement->date }}</td>
                    <td>{{ $emargement->statut }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
