<!DOCTYPE html>
<html lang="es">
<?php
include(__DIR__ . '/connect.php');

$sql = "SELECT * FROM doctors";
$query = mysqli_query($conn, $sql);

$request = $_SERVER["REQUEST_URI"];

switch ($request) {
    case "/":
    case "":
        require "home.php";
        break;
    case "/editarDoctor":
        require "formDoctor.php";
        break;
    // case "":
    // case "":
    default:
        break;
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="src/style.css">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="src/script.js"></script>
    <title>Panel Informatiu </title>
</head>
<!-- Card 1 Mostrar info -->
<body>
    <div class="container px-4 text-center m-3">
        <div class="row align-items-start">
            <!-- Primer card -->
            <div class="col-md-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row gx-5">
                        <div class="col-md-4">
                            <img src="src/MostrarInfoIcona.png" style="max-width: 100%; max-height: 200px;" class="img-fluid img-limited rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Mostrar informació per la pantalla</h5>
                                <p class="card-text">Mostrar als pacients la informació dels doctors (Especialització, nom i cognoms, planta i consulta).</p>
                                <a id="originalButton" class="btn btn-primary">Visualitzar</a>
                                <button class="btn btn-primary" type="button" disabled style="display:none;">
                                    <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                                    <span role="status">Carregant dades...</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Card 2 Editar info -->
            <div class="col-md-6 ">
                <div class="card mb-3">
                    <div class="row gx-5 " >
                        <div class="col-md-4" >
                            <img src="src/EditIcon.png" style="max-width: 100%; max-height: 200px;" class="img-fluid imatge-visualitzar rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Editar informació de la pantalla </h5>
                                <p class="card-text">Podrà canviar la informació dels doctors.</p> 
                                <!-- Farà falta assignar-li una redirecció -->
                                <a href="#" class="btn btn-primary">Editar</a> 
                            </div>
                            &nbsp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>