<?php
session_start();
include 'conexion.php'; // Asegúrate de incluir el archivo de conexión

// Manejo del registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $celular = $_POST['celular'];
    $plan = $_POST['plan'];
    $tipoPlan = isset($_POST['tipoPlan']) ? $_POST['tipoPlan'] : null;

    // Verificar si el usuario ya existe
    $sql = "SELECT * FROM usuarios WHERE usuario = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $error = "El usuario o email ya está registrado.";
        header("Location: index.php?error=" . urlencode($error));
        exit();
    } else {
        // Insertar nuevo usuario
        $sql = "INSERT INTO usuarios (nombres, apellidos, sexo, email, direccion, usuario, clave, celular, plan, tipoPlan) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $hashed_password = password_hash($clave, PASSWORD_DEFAULT); // Hashear la contraseña
        $stmt->bind_param("ssssssssss", $nombres, $apellidos, $sexo, $email, $direccion, $usuario, $hashed_password, $celular, $plan, $tipoPlan);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $conn->insert_id; // Guardar ID del nuevo usuario en la sesión
            header("Location: index.php?success=Usuario registrado exitosamente.");
            exit();
        } else {
            $error = "Error al registrar el usuario: " . $stmt->error;
            header("Location: index.php?error=" . urlencode($error));
            exit();
        }
    }

    $stmt->close();
}
$conn->close();
?>
