<!-- resources/views/layouts/navigation.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Mon Application</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- Lien vers l'accueil -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                </li>

                <!-- Vérification si l'utilisateur est connecté -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cours.index') }}">Cours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('emargements.index') }}">Présences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Utilisateurs</a>
                    </li>

                    <!-- Déconnexion -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <!-- Liens pour les utilisateurs non connectés -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
