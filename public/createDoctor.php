<?php

include(__DIR__ . '/connect.php');  

$name = $_POST['Nom'];
$surname = $_POST['Cognom'];
$specialty_id = $_POST['id_especialitat'];
$location_id = $_POST['id_localitzacio'];
$hidden = 0;

if ($location_id = 1){
    
}

// Sentència preparada
$stmt = $conn->prepare("INSERT INTO doctors (id, name, surname, specialty_id, location_id, hidden) VALUES (?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Error: " . $conn->error);
}
$stmt->bind_param("issiii", $id, $name, $surname, $specialty_id, $location_id, $hidden);  

$result = $stmt->execute();

if($result) {
    echo "Insertado con éxito";
} else {
    echo "Error: " . mysqli_error($conn);
}

$stmt->close();
$conn->close();


