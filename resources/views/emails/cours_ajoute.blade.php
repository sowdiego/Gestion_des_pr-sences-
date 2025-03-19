<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Cours</title>
</head>
<body>
<h2>Bonjour {{ $professeur }},</h2>
<p>Un nouveau cours vous a été attribué :</p>

<ul>
    <li><strong>Nom du cours :</strong> {{ $nom }}</li>
    <li><strong>Description :</strong> {{ $description }}</li>
    <li><strong>Heure :</strong> {{ $heure_debut }} - {{ $heure_fin }}</li>
    <li><strong>Salle :</strong> {{ $salle }}</li>
</ul>

<p>Merci de consulter la plateforme pour plus de détails.</p>

<p>Cordialement,<br>L'équipe de Gestion des Présences</p>
</body>
</html>
