<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $sexo = $_POST['sexo'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $plan = $_POST['plan'];
    $tipoPlan = isset($_POST['tipoPlan']) ? $_POST['tipoPlan'] : null;

    // Verificar si las claves coinciden
    $confirmarClave = $_POST['confirmarClave'];
    if ($clave !== $confirmarClave) {
        header("Location: index.php?error=Las claves no coinciden.");
        exit();
    }

    // Verificar la longitud de la clave
    if (strlen($clave) < 6) {
        header("Location: index.php?error=La clave debe tener al menos 6 caracteres.");
        exit();
    }

    // Encriptar la clave
    $hashed_password = password_hash($clave, PASSWORD_BCRYPT);

    // Preparar la consulta para insertar datos
    $sql = "INSERT INTO usuarios (nombres, apellidos, sexo, email, direccion, usuario, clave, celular, plan, tipoPlan) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $nombres, $apellidos, $sexo, $email, $direccion, $usuario, $hashed_password, $celular, $plan, $tipoPlan);

    if ($stmt->execute()) {
        header("Location: index.php?success=Registro exitoso.");
    } else {
        header("Location: index.php?error=Error al registrar.");
    }

    $stmt->close();
}
$conn->close();
?>
