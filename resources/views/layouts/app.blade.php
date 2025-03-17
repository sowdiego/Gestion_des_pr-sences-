
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des présences des professeurs (ISI)</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ajouter d'autres styles CSS si nécessaire -->
</head>

<body>
<div id="app">
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Gestion des présences des professeurs (ISI)</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- Lien vers la page d'accueil -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>

                    @guest
                        <!-- Si l'utilisateur n'est pas connecté -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                        </li>
                       {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
                        </li>--}}
                    @else
                        <!-- Si l'utilisateur est connecté -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cours.index') }}">Cours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('emargements.index') }}">Présences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('emargements.create') }}">Ajouter émargement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">Utilisateurs</a>
                        </li>
                        <!-- Menu de déconnexion -->
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link" style="color: white;">Se déconnecter</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content') <!-- Contenu spécifique aux pages -->
    </div>

</div>

<!-- Inclure les scripts JS nécessaires -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
