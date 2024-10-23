<!DOCTYPE html>
<html>
<head>
    <title>Liste des Livraisons</title>
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
    <h1>Liste des Livraisons</h1>
    <table>
        <thead>
            <tr>
                <th>Date de Livraison</th>
                <th>Statut</th>
                <th>Date de Collecte</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livraisons as $livraison)
                <tr>
                    <td>{{ $livraison->date_livraison }}</td>
                    <td>{{ $livraison->statut }}</td>
                    <td>{{ $livraison->collecte->date_collecte }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
