<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/test" method="post">
        <input type="text" name="baby">
        <input type="text" name="boba[]">
        <input type="text" name="boba[]">
        <input type="hidden" name="jsonData" id="jsonData" value="">

        <button type="submit">
            submit
        </button>
    </form>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Créez un objet JSON
        var jsonDataObject = {
            "nom": "John",
            "age": 30,
            "ville": "Paris"
        };

        // Convertissez l'objet JSON en une chaîne JSON
        var jsonDataString = JSON.stringify(jsonDataObject);

        // Placez la chaîne JSON dans le champ caché
        document.getElementById('jsonData').value = jsonDataString;
    });
</script>

</html>

