<?php
include 'conexion.php';
session_start(); // Iniciar la sesión

// Mostrar errores para ayudar a depurar
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar si la solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        die("Usuario no autenticado.");
    }
    $id_usuario = $_SESSION['user_id'];

    // Obtener los datos del formulario
    $peso = isset($_POST['peso']) ? $_POST['peso'] : null;
    $talla = isset($_POST['talla']) ? $_POST['talla'] : null;
    $isotipo = isset($_POST['isotipo']) ? $_POST['isotipo'] : null;
    $edad = isset($_POST['edad']) ? $_POST['edad'] : null;
    $actividad_fisica = isset($_POST['actividad_fisica']) ? $_POST['actividad_fisica'] : null;
    $indice_masa = isset($_POST['indice_masa']) ? $_POST['indice_masa'] : null;
    $indice_grasa = isset($_POST['indice_grasa']) ? $_POST['indice_grasa'] : null;

    if ($peso && $talla && $isotipo && $edad && $actividad_fisica && $indice_masa && $indice_grasa) {
        $sql = "INSERT INTO cliente (id_usuario, peso, talla, isotipo, edad, actividad_fisica, indice_masa, indice_grasa)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("iddsdsdd", $id_usuario, $peso, $talla, $isotipo, $edad, $actividad_fisica, $indice_masa, $indice_grasa);

            if ($stmt->execute()) {
                echo "Registro exitoso";
            } else {
                echo "Error al registrar: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error al preparar la declaración: " . $conn->error;
        }
    } else {
        echo "Datos incompletos en el formulario.";
    }
} else {
    echo "El formulario no fue enviado.";
}

$conn->close();
?>
