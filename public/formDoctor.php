<?php
include(__DIR__ . '/connect.php');
include(__DIR__ . '/header.php');
include(__DIR__ . '/select.php');
mysqli_set_charset($conn, 'utf8mb4');

$query = mysqli_query($conn, $sql);
$queryM = mysqli_query($conn, $sqlMorning);
$queryT = mysqli_query($conn, $sqlAfternoon);

?>

<html lang="es">

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
            <input type="text" name="id_localitzacio" placeholder="Localització">

            <input id="submitBtn" type="submit" value="Send "></input>
        </form>
    </div>

    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne">
                    <h2 class="fs-3 badge text-bg-warning ">MATÍ i TARDE</h2>
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <table class="table">
                        <thead class="container px-4 text-center">
                            <th>Nom</th>
                            <th>Cognom</th>
                            <th>Especialització</th>
                            <th>Planta</th>
                            <th>Consulta</th>
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

                                        <?= $row['type_specialty'] ?>

                                    </th>
                                    <th>
                                        <?= $row['floor'] ?>
                                    </th>
                                    <th>
                                        <?= $row['room'] ?>
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
                    <form method="POST" action="createDoctor.php">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crea doctor/a</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <!-- Cos del modal amb el formulari -->
                                    <div class="modal-body">
                                        <!-- Nom -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="Nom" class="form-control" id="nameInput"
                                                placeholder="Nom de la persona">
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
                                        $specialty = "SELECT type_specialty FROM `specialties`";
                                        $query = mysqli_query($conn, $specialty);
                                        ?>
                                        <div class="form-floating consulta-div">
                                            <select class="form-select" id="specialtySelect"
                                                aria-label="Floating label select specialty's doctor">
                                                <option selected>Selecciona l'especialització</option>
                                                <?php while ($row = mysqli_fetch_assoc($query)): ?>
                                                    <option name="TipusEspecialitat" value="<?= $row['type_specialty'] ?>">
                                                        <?= $row['type_specialty'] ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                            <label for="plantaSelect">Planta de la consulta</label>
                                        </div>
                                        <!-- Localització  -->
                                        <?php
                                        $floor = "SELECT floor from locations";
                                        $queryF = mysqli_query($conn, $floor);
                                        $room = "SELECT room from 'locations'";
                                        $queryR = mysqli_query($conn, $room);
                                        ?>
                                        <div class="form-floating consulta-div">
                                            <select name="floor" class="form-select" id="plantaSelect"
                                                onchange="ChangeList()"
                                                aria-label="Floating label select consultation's doctor">
                                                <option selected>Selecciona la planta</option>
                                                <?php while ($row = mysqli_fetch_assoc($queryF)): ?>
                                                    <option name="Planta" value="<?= $row['floor'] ?>">
                                                        <?= $row['floor'] ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                            <label for="plantaSelect">Planta de la consulta</label>
                                        </div>
                                        <!-- Consulta  -->
                                        <div
                                            class="form-floating mb-3; border-collapse: separate; border-spacing: 5px;">
                                            <select name="Consulta" id="consultaSelect" class="form-select">
                                                <!-- Los números de las consultas irán aquí -->
                                            </select>
                                            <label for="consultaSelect">Número de la consulta</label>
                                        </div>

                                        <!-- Tancar / Afegir canvis  -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tanca</button>
                                            <button type="submit" class="btn btn-primary">Afegeix</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseTwo">
                    <h2 class="badge text-bg-warning fs-3">MATÍ</h2>
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <table class="table">
                        <thead class="container px-4 text-center">
                            <th>Nom</th>
                            <th>Cognom</th>
                            <th>Especialització</th>
                            <th>Planta</th>
                            <th>Consulta</th>
                        </thead>
                        <tbody class="container px-4 text-center">
                            <?php
                            $queryM = mysqli_query($conn, $sqlMorning);
                            if ($queryM) {
                                while ($row = mysqli_fetch_array($queryM)): ?>
                                    <tr>
                                        <th>
                                            <?= $row['name'] ?>
                                        </th>
                                        <th>
                                            <?= $row['surname'] ?>
                                        </th>
                                        <th>
                                            <?= $row['type_specialty'] ?>
                                        </th>
                                        <th>
                                            <?= $row['floor'] ?>
                                        </th>
                                        <th>
                                            <?= $row['room'] ?>
                                        </th>
                                    </tr>
                                <?php endwhile;
                            } else {
                                echo "Error en la consulta: " . mysqli_error($conn);
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Crear metge
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crea doctor/a</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <!-- Cos del modal amb el formulari -->
                                <div class="modal-body">
                                    <!-- Nom -->
                                    <div class="form-floating mb-3">
                                        <input type="name" class="form-control" id="nameInput"
                                            placeholder="Nom de la persona">
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

                                    $specialty = "SELECT type_specialty FROM `specialties` WHERE id = 1";
                                    $query = mysqli_query($conn, $sql);
                                    ?>
                                    <div class="form-floating consulta-div">
                                        <select class="form-select" id="specialtySelect"
                                            aria-label="Floating label select specialty's doctor">
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
                                        <select class="form-select" id="plantaSelect"
                                            aria-label="Floating label select consultation's doctor">
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
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tanca</button>
                                        <button type="button" class="btn btn-primary">Afegeix</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseThree">
                    <h2 class="badge text-bg-warning fs-3">TARDE</h2>
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <table class="table">
                        <thead class="container px-4 text-center">
                            <th>Nom</th>
                            <th>Cognom</th>
                            <th>Especialització</th>
                            <th>Planta</th>
                            <th>Consulta</th>
                        </thead>
                        <tbody class="container px-4 text-center">
                            <?php
                            $queryT = mysqli_query($conn, $sqlAfternoon);
                            if ($queryT) {
                                while ($row = mysqli_fetch_array($queryT)): ?>
                                    <tr>
                                        <th>
                                            <?= $row['name'] ?>
                                        </th>
                                        <th>
                                            <?= $row['surname'] ?>
                                        </th>
                                        <th>
                                            <?= $row['type_specialty'] ?>
                                        </th>
                                        <th>
                                            <?= $row['floor'] ?>
                                        </th>
                                        <th>
                                            <?= $row['room'] ?>
                                        </th>
                                    </tr>
                                <?php endwhile;
                            } else {
                                echo "Error en la consulta: " . mysqli_error($conn);
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Crear metge
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crea doctor/a</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <!-- Cos del modal amb el formulari -->
                                <div class="modal-body">
                                    <!-- Nom -->
                                    <div class="form-floating mb-3">
                                        <input type="name" class="form-control" id="nameInput"
                                            placeholder="Nom de la persona">
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
                                    $specialty = "SELECT type_specialty FROM `specialties` WHERE id = 1";
                                    $query = mysqli_query($conn, $sql);
                                    ?>
                                    <div class="form-floating consulta-div">
                                        <select class="form-select" id="specialtySelect"
                                            aria-label="Floating label select specialty's doctor">
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
                                        <select class="form-select" id="plantaSelect"
                                            aria-label="Floating label select consultation's doctor">
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
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tanca</button>
                                        <button type="button" class="btn btn-primary">Afegeix</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<?php
$floor_query = "SELECT DISTINCT floor FROM locations";
$queryF = mysqli_query($conn, $floor_query);

$rooms_by_floor = [];
while ($row = mysqli_fetch_assoc($queryF)) {
    $floor = $row['floor'];
    $room_query = "SELECT room FROM locations WHERE floor = '$floor'";
    $queryR = mysqli_query($conn, $room_query);
    
    $rooms = [];
    while ($room_row = mysqli_fetch_assoc($queryR)) {
        $rooms[] = $room_row['room'];
    }
    $rooms_by_floor[$floor] = $rooms;
}
?>

<script>
    var floorsAndRooms = <?php echo json_encode($rooms_by_floor); ?>;

    function ChangeList() {
        var floorList = document.getElementById("plantaSelect");
        var roomList = document.getElementById("consultaSelect");
        var selectedFloor = floorList.options[floorList.selectedIndex].value;
        
        // Limpiar existents opcions
        while (roomList.options.length) {
            roomList.remove(0);
        }
        
        // Obtenir les habitacions corresponents a la planta seleccionada
        var rooms = floorsAndRooms[selectedFloor];
        
        if (rooms) {
            for (var i = 0; i < rooms.length; i++) {
                var roomOption = new Option(rooms[i], rooms[i]);
                roomList.options.add(roomOption);
            }
        }
    }
</script>
