<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Employés</title>
    <style>
        /* Styles pour le tableau */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        /* Styles pour le titre */
        h1 {
            font-size: 28px;
            color: #007BFF;
            margin-bottom: 20px;
        }

        /* Styles pour le conteneur */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        /* Styles pour les légendes */
        .legend {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 10px;
        }

        /* Couleur de fond pour les lignes impaires du tableau */
        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des Employés</h1>
        <div class="legend">Légendes :</div>
        <ul>
            <li>1 - John Doe</li>
            <li>2 - Jane Smith</li>
            <li>3 - Bob Johnson</li>
            <li>4 - Alice Brown</li>
            <li>5 - Charlie Davis</li>
        </ul>
        <table>
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Nom de l'employé</th>
                    <th>Salaire</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>50 000 €</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td><?php echo "45 000 €"?> </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Bob Johnson</td>
                    <td>55 000 €</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Alice Brown</td>
                    <td>48 000 €</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Charlie Davis</td>
                    <td>52 000 €</td>
                </tr>
                <!-- Ajoutez d'autres lignes ici pour plus d'employés -->
            </tbody>
        </table>
    </div>
</body>
</html>
