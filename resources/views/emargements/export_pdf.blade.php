<!DOCTYPE html>
<html>
<head>
    <title>Historique des Présences</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
<h2>Historique des Présences</h2>
<table>
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
</body>
</html>
