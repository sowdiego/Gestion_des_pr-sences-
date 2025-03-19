@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Tableau de bord</h2>

        @if(session('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Nombre d’émargements par professeur</div>
            <div class="card-body">
                @if(count($professeurs) > 0)
                    <canvas id="emargementChart"></canvas>
                @else
                    <p>Aucune donnée disponible.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Inclure Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('emargementChart');
            if (ctx && @json(count($professeurs)) > 0) {
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($professeurs->pluck('nom')),
                        datasets: [{
                            label: 'Nombre d’émargements',
                            data: @json($professeurs->pluck('total')),
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    </script>

@endsection
