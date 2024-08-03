<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirigir al login si el usuario no está autenticado
    header("Location: login.html");
    exit();
}

$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <meta http-equiv="refresh" content="3;url=bienvenidocliente.html">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .welcome-message {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="welcome-message">
        <h1>¡Bienvenido, <?php echo htmlspecialchars($user_name); ?>!</h1>
        <p>Serás redirigido a tu página principal en breve...</p>
    </div>
</body>
</html>
