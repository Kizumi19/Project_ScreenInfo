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
$hidden = 0;


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


