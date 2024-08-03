<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirigir al login si el usuario no está autenticado
    header("Location: login.html");
    exit();
}

// Verificar si el nombre de usuario está en la sesión
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Invitado';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
        }
        .welcome-message {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        .welcome-message h1 {
            margin: 0 0 10px;
        }
        .welcome-message p {
            margin: 0 0 20px;
        }
        .welcome-message a {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 10px;
        }
        .welcome-message a:hover {
            background-color: #0056b3;
        }
        .logout-button {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #dc3545;
            border-radius: 5px;
            text-decoration: none;
        }
        .logout-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="welcome-message">
        <h1>¡Bienvenido, <?php echo htmlspecialchars($user_name); ?>!</h1>
        <p>Gracias por registrarte e iniciar sesión. Estamos encantados de tenerte con nosotros.</p>
        <p><a href="pagina_principal.php">Ir a tu página principal</a></p>
        <p><a href="cerrarsesion.php" class="logout-button">Cerrar sesión</a></p>
    </div>
</body>
</html>
