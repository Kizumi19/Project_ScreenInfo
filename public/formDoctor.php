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
    <h1>Formulari</h1>

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
                    <form class="needs-validation" method="POST" action="createDoctor.php">
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
                                            <input type="surname" name="Cognom" class="form-control" id="surnameInput"
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
                                            <label for="plantaSelect">Especialització del doctor/a</label>
                                        </div>

                                        <!-- Torn  -->
                                        <?php
                                        $shift = "SELECT `shift` FROM `schedules`";
                                        $queryShift = mysqli_query($conn, $shift);
                                        if (!$queryShift) {
                                            die("Query failed: " . mysqli_error($conn));
                                        }

                                        ?>
                                        <!-- <div
                                            class="form-floating mb-3; border-collapse: separate; border-spacing: 5px;">
                                            <select class="form-select">
                                                <?php
                                                while ($row = mysqli_fetch_array($queryShift)): ?>
                                                    <option value="<?= $row['shift'] ?>">
                                                        <?= $row['shift'] ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                            <label for="tornSelect">Torn que farà (de matí, de tarde o tots dos)</label>
                                        </div> -->
                                        <div
                                            class="form-floating mb-3; border-collapse: separate; border-spacing: 5px;">
                                            <select class="form-select">
                                                <option name="Torn" value="<?= $row['shift'] ?>">
                                                    Matí
                                                </option>
                                                <option name="Torn" value="<?= $row['shift'] ?>">
                                                    Tarde
                                                </option>
                                                <option name="Torn" value="<?= $row['shift'] ?>">
                                                    Matí i tarde
                                                </option>
                                            </select>
                                            <label for="tornSelect">Torn que farà (de matí, de tarde o tots dos)</label>
                                        </div>

                                        <!-- Dia  -->
                                        <!-- <div class="form-floating form-check form-check-inline">
                                            <input name="Dia" class="form-check-input" type="checkbox"
                                                id="inlineCheckbox1" value="<?= $day ?>">
                                            <label class="form-check-label" for="inlineCheckbox1">Dilluns</label>
                                        </div> -->
                                        
                                        <div id="days-container">

                                            <div class="form-check form-check-inline">
                                                <input name="Dia" class="form-check-input" type="checkbox"
                                                    id="inlineCheckbox1" value="Dilluns">
                                                <label class="form-check-label" for="inlineCheckbox1">Dilluns</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input name="Dia" class="form-check-input" type="checkbox"
                                                    id="inlineCheckbox2" value="Dimarts">
                                                <label class="form-check-label" for="inlineCheckbox2">Dimarts</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input name="Dia" class="form-check-input" type="checkbox"
                                                    id="inlineCheckbox3" value="Dimecres">
                                                <label class="form-check-label" for="inlineCheckbox3">Dimecres</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input name="Dia" class="form-check-input" type="checkbox"
                                                    id="inlineCheckbox4" value="Dijous">
                                                <label class="form-check-label" for="inlineCheckbox4">Dijous</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input name="Dia" class="form-check-input" type="checkbox"
                                                    id="inlineCheckbox5" value="Divendres">
                                                <label class="form-check-label" for="inlineCheckbox5">Divendres</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input name="Dia" class="form-check-input" type="checkbox"
                                                    id="inlineCheckbox6" value="Dissabte">
                                                <label class="form-check-label" for="inlineCheckbox6">Dissabte</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input name="Dia" class="form-check-input" type="checkbox"
                                                    id="inlineCheckbox7" value="Diumenge" disabled>
                                                <label class="form-check-label" for="inlineCheckbox7" >Diumenge</label>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>

                                        <!-- onchange="ChangeList()" -->
                                        <!-- Aquí está tu toast (mensaje) -->
                                        
                                        <div class="toast" style="position: absolute; top: 0; right: 0;" role="alert"
                                            aria-live="assertive" aria-atomic="true" id="myToast">
                                            <div class="toast-body" role="alert" aria-live="assertive"
                                                aria-atomic="true">
                                                ⚠️ Compte! El doctor/a vindrà els dies que has seleccionat durant el
                                                <strong>TORN</strong> que has seleccionat.
                                            </div>
                                            <div class="mt-2 pt-2 border-top">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    data-bs-dismiss="toast">Entesos!
                                                </button>
                                                <button type="button" id="toastEl" class="btn btn-secondary btn-sm"
                                                    data-bs-dismiss="toast" aria-label="No mostrar de nou">
                                                    No mostrar de nou
                                                </button>

                                            </div>
                                        </div>
                                        <div class="mt-3"></div>

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
                                            placeholder="Nom de la persona" required>
                                        <label for="nameInput">Nom</label>
                                    </div>
                                    <!-- Cognom -->
                                    <div class="form-floating mb-3">
                                        <input type="surname" class="form-control" id="surnameInput"
                                            placeholder="Cognoms de la persona" required>
                                        <label for="surnameInput">Cognoms</label>
                                    </div>
                                    <!-- Especialitat -->
                                    <?php
                                    $specialty = "SELECT type_specialty FROM `specialties` WHERE id = 1";
                                    $query = mysqli_query($conn, $sql);
                                    ?>
                                    <div class="form-floating consulta-div">
                                        <select class="form-select" id="specialtySelect"
                                            aria-label="Floating label select specialty's doctor" required>
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
                                        <select class="form-select" name="Planta" id="plantaSelect"
                                            aria-label="Floating label select consultation's doctor">
                                            <option selected required>Selecciona la planta</option>
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
                                        <input type="Consulta" class="form-control" id="specialityInput"
                                            placeholder="Consulta de la persona" required>
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

    // Validació per al formulari
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

    // Per poder mostrar un missatge d'ajuda per a l'usuari al moment que cliqui el dia de la setmana:
    //Entesos!
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.form-check-input');
        const toast = new bootstrap.Toast(document.getElementById('myToast'));
        let toastHide = false;
        const buttonHide = document.getElementById('toastEl');

        buttonHide.addEventListener('click', function () {
            toastHide = true;
        });

        if (toastHide === false) {
            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('click', function () {
                    toast.show();
                });
            });
        } else {
            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('click', function () {
                    toast.dispose();
                });
            });
        }
    });

    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
</script>