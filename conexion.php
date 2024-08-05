<?php
$servername = "localhost";          // Cambia esto si es necesario
$username = "gimnasioathletic";     // Cambia esto si es necesario
$password = "Reynersvp2024";        // Cambia esto si es necesario
$dbname = "athletic";               // Cambia esto si es necesario

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
