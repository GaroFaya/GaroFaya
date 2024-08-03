<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Preparar y ejecutar la consulta
    $sql = "SELECT id, nombres, clave FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nombres, $hashed_password);
        $stmt->fetch();
        
        // Verificar la contraseña
        if (password_verify($clave, $hashed_password)) {
            $_SESSION['user_id'] = $id; // Guardar el ID del usuario en la sesión
            $_SESSION['user_name'] = $nombres; // Guardar el nombre del usuario en la sesión

            // Redirigir a la página de bienvenida
            header("Location: bienvenida.php");
            exit();
        } else {
            header("Location: login.html?error=Usuario o contraseña incorrectos.");
            exit();
        }
    } else {
        header("Location: login.html?error=Usuario o contraseña incorrectos.");
        exit();
    }
    $stmt->close();
}
$conn->close();
?>
