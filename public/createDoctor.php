<?php

include(__DIR__ . '/connect.php');  

// Info bàsica
$name = $_POST['Nom'];
$surname = $_POST['Cognom'];
$location_id = $_POST['id_localitzacio'];
$type_specialty = $_POST['TipusEspecialitat'];

//Info a enllaçar
$floor = $_POST['Planta'];
$room = $_POST['Consulta'];
$shift = $_POST['Torn'];
$day = $_POST['Dia'];

$hidden = 0;

// Passar d'idioma de català al de la base de dades
if ($shift == 'Matí') {
 $shift = 'morning';   
} else if($shift == 'Tarde')  {
    $shift = 'afternoon';
}

// Passar d'idioma de català al de la base de dades
if ($day == 'Dilluns') {
    $day = 'monday';   
   } else if($day == 'Dimarts')  {
       $day = 'tueday';
   } else if($day == 'Dimecres') {
    $day = 'wednesday';
   }
else if($day == 'Dijous') {
    $day = 'tuesday';
} else if($day == 'Divendres') {
    $day = 'friday';
} else if($day == 'Dissabte') {
    $day = 'saturday';
} else if($day == 'Diumenge') {
    $day = 'sunday';
}


// Sentència preparada -- Info bàsoca
$stmt = $conn->prepare("INSERT INTO doctors (name, surname, location_id, hidden) VALUES (?, ?, ?, ?)");
if ($stmt === false) {
    die("Error: " . $conn->error);
}
$stmt->bind_param("ssii", $name, $surname, $location_id, $hidden);  

$result = $stmt->execute();

if($result) {
    echo "Insertado con éxito";
} else {
    echo "Error: " . mysqli_error($conn);
}




$stmt->close();
$conn->close();


