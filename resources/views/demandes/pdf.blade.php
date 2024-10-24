<!DOCTYPE html>
<html>
<head>
    <title>Liste des Demandes</title>
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
    <h1>Liste des Demandes</h1>
    <table>
        <thead>
            <tr>
                <th>Type de Produit</th>
                <th>Quantité</th>
                <th>Fréquence de Besoin</th>
                <th>Statut</th>
                <th>Bénéficiaire</th>
                <th>Date de Création</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demandes as $demande)
                <tr>
                    <td>{{ $demande->type_produit }}</td>
                    <td>{{ $demande->quantite }}</td>
                    <td>{{ $demande->frequence_besoin }}</td>
                    <td>{{ $demande->statut }}</td>
                    <td>{{ $demande->benificaire->nom }}</td> <!-- Assurez-vous que 'nom' est l'attribut correct -->
                    <td>{{ $demande->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
