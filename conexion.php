
<?php
                            //feat: update conexion.php
$servername = "localhost"; // Cambia esto si es necesario
$username = "root";        // Cambia esto si es necesario
$password = "";            // Cambia esto si es necesario
$dbname = "mi_base_datos"; // Cambia esto si es necesario

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
