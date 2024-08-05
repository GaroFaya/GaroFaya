<?php
$servername = "localhost";
$username = "gimnasioathletic";
$password = "Reynersvp2024";
$dbname = "athletic";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
