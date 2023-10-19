<?php

include(__DIR__ . '/connect.php');  

$name = $_POST['Nom'];
$surname = $_POST['Cognom'];
$location_id = $_POST['id_localitzacio'];
$hidden = 0;

// if ($location_id = 1){
    
// }

// Sentència preparada
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


// 1. Crear una altra sentència

// 1.1 Recollir les dades del formulari

// 1.2 Transformar els noms per les id ex; id_especulització (1 = dermatología)

// 1.3 Repetir el mateix procés però amb localització

$stmt->close();
$conn->close();


