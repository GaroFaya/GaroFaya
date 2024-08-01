<?php
include 'conexion.php';

// Obtener los datos del formulario
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$sexo = $_POST['sexo'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$usuario = $_POST['usuario'];
$clave = password_hash($_POST['clave'], PASSWORD_BCRYPT); // Encriptar la clave
$tipo = $_POST['tipo'];
$plan = $_POST['plan'];
$estado = $_POST['estado'];

// Preparar la consulta SQL
$sql = "INSERT INTO usuarios (nombres, apellidos, sexo, email, direccion, usuario, clave, tipo, plan, estado) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Usar una sentencia preparada para evitar inyecciones SQL
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $nombres, $apellidos, $sexo, $email, $direccion, $usuario, $clave, $tipo, $plan, $estado);

if ($stmt->execute()) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

//feat: update conexion.php
?>
