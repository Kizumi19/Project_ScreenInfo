<!DOCTYPE html>
<html lang="es">

<?php

require_once(__DIR__ . '/config/connect.php');
include(__DIR__ . '/config/connect.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery -->
    <script src="/path/to/cdn/jquery.slim.min.js"></script>
    <!-- Load Validation JS -->
    <script src="/path/to/bs4-form-validation.min.js"></script>
    <title>Panel Informatiu </title>
</head>

<body>
    <div>
        <form action="">
            <h1>Formulari</h1>
            <input type="text" name="Nom" placeholder="Nom">
            <input type="text" name="Cognom" placeholder="Cognom">
            <input type="text" name="id_especialitat" placeholder="Especialitat">
            <input type="text" name="id_localitzacio" placeholder="Localització">

        </form>
    </div>

    <div>
        <table>
            <thead>
                <th>Nom</th>
                <th>Cognom</th>
                <th>especialització</th>
                <th>localització</th>
            </thead>

            <tbody>
                <?php while($row = mysqli_fetch_array($query)); ?>
                <tr>
                    <th> <?= $row['name'] ?> </th>
                    <th> <?= $row['surname'] ?> </th>
                    <th> <?= $row['specialty_id'] ?> </th>
                    <th> <?= $row['location_id'] ?> </th>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>