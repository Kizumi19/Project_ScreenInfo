<!DOCTYPE html>
<html lang="es">
<?php
include(__DIR__ . '/connect.php');
$sql = "SELECT * FROM doctors";
$query = mysqli_query($conn, $sql);

$request = $_SERVER["REQUEST_URI"];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="src/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="src/script.js"></script>
    <!-- Text i icona web -->
    <title>Panel Informatiu </title>
    <link rel="icon" href="src/favicon.ico" type="image/ico">
</head>

<body>
    <header>
        <div class="container grid gap-0 column-gap-3">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <img src="src/logoHCA.jpeg" style="" class="bi me-2" width="70" height="62"></img>
                    <span class="fs-4"> Pantalla principal </span>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page">Inici</a></li>
                    <li class="nav-item"><a href="FQA.php" class="nav-link">Preguntes freqüents</a></li>
                    <li class="nav-item"><a href="info.php" class="nav-link">Sobre l'APP</a></li>
                </ul>
        </div>
    </header>

</body>

<script>
// Adaptar el títol de la pestanya
$(document).ready(function() {
    var url = window.location.href;

    if (url.includes("index")) {
        $("title").text("Inici - Panel Informatiu");
    } else if (url.includes("FQA")) {
        $("title").text("Preguntes freqüents");
    } else if (url.includes("info")) {
        $("title").text("Sobre l'APP");
    } else {
        $("title").text("Panel informatiu");
    }
});
// Adaptar el  de la pestanya

$(document).ready(function() {
    var url = window.location.href;
    if (url.includes("index")) {
        $('.fs-4').text("Inici - Panel Informatiu");
    } else if (url.includes("FQA")) {
        $('.fs-4').text("Preguntes freqüents");
    } else if (url.includes("info")) {
        $('.fs-4').text("Sobre l'APP");
    } else if (url.includes("formDoctor")){
        $('.fs-4').text("Apartat edició")
    } else {
        $('.fs-4').text("Panel informatiu");
    }
});

</script>