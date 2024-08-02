<?php
include 'conexion.php';

// Obtener los datos del formulario
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$sexo = $_POST['sexo'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$usuario = $_POST['usuario'];
$clave = password_hash($_POST['clave'], PASSWORD_BCRYPT); // Encriptar la clave
$plan = $_POST['plan'];
$tipoPlan = $_POST['tipoPlan'] ?? null; // Opcional si no es mensual
$estado = "inactivo"; // Estado inicial

// Preparar la consulta SQL
$sql = "INSERT INTO usuarios (nombres, apellidos, sexo, celular, email, direccion, usuario, clave, plan, tipoPlan, estado) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Usar una sentencia preparada para evitar inyecciones SQL
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssss", $nombres, $apellidos, $sexo, $celular, $email, $direccion, $usuario, $clave, $plan, $tipoPlan, $estado);

if ($stmt->execute()) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
