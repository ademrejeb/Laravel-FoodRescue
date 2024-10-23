
@extends('layouts.commonMaster')
@section('title', 'Tables - Sponsorship List')

@section('layoutContent')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques des Partenaires</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Statistiques des Partenaires et Sponsorships</h1>
        <hr>

        <h4>Graphiques des Contributions :</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Graphique</th>
                    <th>Détails</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <canvas id="totalContributionsChart" width="400" height="200"></canvas>
                    </td>
                    <td>Total et Moyenne des Contributions</td>
                </tr>
                <tr>
                    <td>
                        <canvas id="contributionsParTypeChart" width="400" height="200"></canvas>
                    </td>
                    <td>Contributions par Type</td>
                </tr>
                <tr>
                    <td>
                        <canvas id="topPartenairesChart" width="400" height="200"></canvas>
                    </td>
                    <td>Top 5 Partenaires les Plus Généreux</td>
                </tr>
            </tbody>
        </table>

        <h4>Contributions Récentes :</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Partenaire ID</th>
                    <th>Montant</th>
                    <th>Type</th>
                    <th>Date de Début</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contributions_recentes as $contribution)
                    <tr>
                        <td>{{ $contribution->partenaire_id }}</td>
                        <td>{{ $contribution->montant }}</td>
                        <td>{{ $contribution->type_soutien }}</td>
                        <td>{{ $contribution->date_debut }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const totalContributionsData = {
            labels: ['Total Contributions', 'Moyenne Contributions'],
            datasets: [{
                label: 'Contributions',
                data: [{{ $total_contributions }}, {{ $moyenne_contributions }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        };

        const contributionsParTypeData = {
            labels: @json($contributions_par_type->pluck('type_soutien')),
            datasets: [{
                label: 'Total par Type',
                data: @json($contributions_par_type->pluck('total')),
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        const topPartenairesData = {
            labels: @json($top_partenaires->pluck('nom')),
            datasets: [{
                label: 'Total Contributions',
                data: @json($top_partenaires->pluck('total_contributions')),
                backgroundColor: 'rgba(153, 102, 255, 0.6)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        };

        const configTotalContributions = {
            type: 'pie', // Graphique circulaire
            data: totalContributionsData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Total et Moyenne des Contributions'
                    }
                }
            }
        };

        const configContributionsParType = {
            type: 'bar',
            data: contributionsParTypeData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const configTopPartenaires = {
            type: 'bar',
            data: topPartenairesData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Créer les graphiques
        var totalContributionsChart = new Chart(
            document.getElementById('totalContributionsChart'),
            configTotalContributions
        );

        var contributionsParTypeChart = new Chart(
            document.getElementById('contributionsParTypeChart'),
            configContributionsParType
        );

        var topPartenairesChart = new Chart(
            document.getElementById('topPartenairesChart'),
            configTopPartenaires
        );
    </script>
</body>
</html>
@endsection