<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Videojocs API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Benvingut a l'API de Videojocs</h1>
            <p class="text-muted">Aquesta API funciona amb respostes JSON. Fes clic per provar rutes GET.</p>
        </div>

        <div class="d-flex flex-column gap-3 col-6 mx-auto">

            <a href="/api/videojocs" class="btn btn-primary btn-lg">
                Llistar tots els videojocs
            </a>

            <a href="/api/videojocs/1" class="btn btn-secondary btn-lg">
                Mostrar videojoc amb ID 1
            </a>

            <a href="/api/videojocs/disponibles" class="btn btn-success btn-lg">
                Videojocs disponibles
            </a>

            <div class="alert alert-info mt-4">
                Per crear o eliminar videojocs (POST / DELETE), utilitza Postman o Insomnia.
            </div>
        </div>
    </div>

</body>

</html>

