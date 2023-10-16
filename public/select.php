<?php
include(__DIR__ . '/connect.php');
$sql = "SELECT doctors.name, doctors.surname, specialties.type_specialty, locations.floor, locations.room
FROM doctors
LEFT JOIN doctor_specialty ON doctors.id = doctor_specialty.doctor_id
LEFT JOIN specialties ON doctor_specialty.specialty_id = specialties.id
LEFT JOIN locations ON doctors.location_id = locations.id
ORDER BY `locations`.`floor` ASC";

$sqlMorning = "SELECT doctors.name, doctors.surname, specialties.type_specialty, locations.floor, locations.room
FROM doctors
LEFT JOIN doctor_specialty ON doctors.id = doctor_specialty.doctor_id
LEFT JOIN specialties ON doctor_specialty.specialty_id = specialties.id
LEFT JOIN locations ON doctors.location_id = locations.id
WHERE schedules.shift = 'morning'
ORDER BY `locations`.`floor` ASC";

$sqlAfternoon = "SELECT doctors.name, doctors.surname, specialties.type_specialty, locations.floor, locations.room
FROM doctors
LEFT JOIN doctor_specialty ON doctors.id = doctor_specialty.doctor_id
LEFT JOIN specialties ON doctor_specialty.specialty_id = specialties.id
LEFT JOIN locations ON doctors.location_id = locations.id
WHERE schedules.shift = 'afternoon'
ORDER BY `locations`.`floor` ASC"
?>