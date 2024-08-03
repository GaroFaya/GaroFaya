<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $celular = isset($_POST['celular']) ? $_POST['celular'] : null;
    $plan = isset($_POST['plan']) ? $_POST['plan'] : null;
    $tipoPlan = isset($_POST['tipoPlan']) ? $_POST['tipoPlan'] : null;

    $sql = "INSERT INTO usuarios (nombres, apellidos, sexo, email, direccion, usuario, clave, celular, plan, tipoPlan)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssssssss", $nombres, $apellidos, $sexo, $email, $direccion, $usuario, $clave, $celular, $plan, $tipoPlan);

        if ($stmt->execute()) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la declaración: " . $conn->error;
    }
}

$conn->close();
?>
