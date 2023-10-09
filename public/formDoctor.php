<!DOCTYPE html>
<html lang="es">

<?php
include(__DIR__ . '/connect.php');
include(__DIR__ . '/header.php');
$sql = "SELECT * FROM doctors";
$query = mysqli_query($conn, $sql);
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
    <title>Editar informació doctor </title>
</head>

<body>
    <header>

    </header>
    <div>
        <form method="POST" action="createDoctor.php">
            <h1>Formulari</h1>
            <input type="text" name="Nom" placeholder="Nom">
            <input type="text" name="Cognom" placeholder="Cognom">
            <input type="text" name="id_especialitat" placeholder="Especialitat">
            <input type="text" name="id_localitzacio" placeholder="Localització">

            <input id="submitBtn" type="submit" value="Send "></input>
        </form>
    </div>

    <div>
        <table class="table">
            <thead class="container px-4 text-center">
                <th>Nom</th>
                <th>Cognom</th>
                <th>Especialització</th>
                <th>Localització</th>
            </thead>

            <tbody class="container px-4 text-center">
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th>
                            <?= $row['name'] ?>
                        </th>
                        <th>
                            <?= $row['surname'] ?>
                        </th>
                        <th>
                            <?= $row['specialty_id'] ?>

                        </th>
                        <th>
                            <?= $row['location_id'] ?>
                        </th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Crear metge
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crea doctor/a</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Cos del modal amb el formulari -->
                    <div class="modal-body">
                    <!-- Nom -->
                        <div class="form-floating mb-3">
                            <input type="name" class="form-control" id="nameInput" placeholder="Nom de la persona">
                            <label for="nameInput">Nom</label>
                        </div>
                    <!-- Cognom -->
                        <div class="form-floating mb-3">
                            <input type="surname" class="form-control" id="surnameInput"
                                placeholder="Cognoms de la persona">
                            <label for="surnameInput">Cognoms</label>
                        </div>
                    <!-- Especialitat -->
                    <?php
                    // Vull que recorri totes les id de les especialitzacions,
                    // guardar-les en un array i passar-les de número id a lletres

                    for ($i = 1; $i <= 10; $i++){ // Pasar de hardcode a softcode

                    }
                    $valor = array(

                    );
                    $specialty = "SELECT type_specialty FROM `specialties` WHERE id = 1";
                    $query = mysqli_query($conn, $sql);
                    ?>
                    <div class="form-floating consulta-div">
                            <select class="form-select" id="specialtySelect" aria-label="Floating label select specialty's doctor">
                                <option selected>Selecciona l'especialització</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <label for="plantaSelect">Planta de la consulta</label>
                        </div>
                    <!-- Localització  -->
                        <div class="form-floating consulta-div">
                            <select class="form-select" id="plantaSelect" aria-label="Floating label select consultation's doctor">
                                <option selected>Selecciona la planta</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <label for="plantaSelect">Planta de la consulta</label>
                        </div>
                    <!-- Consulta  -->
                    <div class="form-floating mb-3; border-collapse: separate; border-spacing: 5px;">
                            <input type="specialty" class="form-control" id="specialityInput"
                                placeholder="Consulta de la persona">
                            <label for="specialityInput">Número de la consulta</label>
                        </div>
                    <!-- Tancar / Afegir canvis  -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tanca</button>
                        <button type="button" class="btn btn-primary">Afegeix</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
<?php
include(__DIR__ . '/footer.php');

?>
</html>
