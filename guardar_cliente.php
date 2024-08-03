<?php
include 'conexion.php';
session_start(); // Iniciar la sesión

// Mostrar errores para ayudar a depurar
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado. Por favor inicie sesión.']);
    exit();
}

// Verificar si la solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION['user_id'];

    // Obtener los datos del formulario
    $peso = isset($_POST['peso']) ? $_POST['peso'] : null;
    $talla = isset($_POST['talla']) ? $_POST['talla'] : null;
    $isotipo = isset($_POST['isotipo']) ? $_POST['isotipo'] : null;
    $edad = isset($_POST['edad']) ? $_POST['edad'] : null;
    $actividad_fisica = isset($_POST['actividad_fisica']) ? $_POST['actividad_fisica'] : null;
    $indice_masa = isset($_POST['indice_masa']) ? $_POST['indice_masa'] : null;
    $indice_grasa = isset($_POST['indice_grasa']) ? $_POST['indice_grasa'] : null;

    // Validar que todos los campos están presentes
    if ($peso !== null && $talla !== null && $isotipo !== null && $edad !== null && $actividad_fisica !== null && $indice_masa !== null && $indice_grasa !== null) {
        // Preparar la declaración SQL
        $sql = "INSERT INTO cliente (id_usuario, peso, talla, isotipo, edad, actividad_fisica, indice_masa, indice_grasa)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Preparar la declaración
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            // Vincular parámetros
            $stmt->bind_param("iddsddds", $id_usuario, $peso, $talla, $isotipo, $edad, $actividad_fisica, $indice_masa, $indice_grasa);

            // Ejecutar la declaración
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Registro exitoso']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al registrar: ' . $stmt->error]);
            }
            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al preparar la declaración: ' . $conn->error]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Datos incompletos en el formulario.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'El formulario no fue enviado.']);
}

$conn->close();
?>
