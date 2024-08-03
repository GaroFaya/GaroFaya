<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="imagen.png" alt="Imagen" class="side-image">
        </div>
        <div class="form-container">
            <form id="registroForm" action="registrar.php" method="POST">
                <h2>Registro</h2>
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" id="nombres" name="nombres" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" required>
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" required>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="celular">Celular:</label>
                    <input type="text" id="celular" name="celular" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" required>
                </div>
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="clave">Clave:</label>
                    <input type="password" id="clave" name="clave" required>
                </div>
                <div class="form-group">
                    <label for="confirmarClave">Confirmar Clave:</label>
                    <input type="password" id="confirmarClave" name="confirmarClave" required>
                </div>
                <p id="mensajeClave" style="color: red; display: none;">La clave debe tener al menos 6 caracteres.</p>
                <div class="form-group">
                    <label for="plan">Plan:</label>
                    <select id="plan" name="plan" required>
                        <option value="interdiario">Interdiario</option>
                        <option value="semanal">Semanal</option>
                        <option value="quincenal">Quincenal</option>
                        <option value="mensual">Mensual</option>
                    </select>
                </div>
                <div class="form-group" id="tipoPlanGroup" style="display: none;">
                    <label for="tipoPlan">Tipo de Plan:</label>
                    <select id="tipoPlan" name="tipoPlan">
                        <option value="basico">Básico</option>
                        <option value="fitness">Fitness</option>
                        <option value="premium">Premium</option>
                    </select>
                </div>
                <button type="submit">Registrar</button>
                <?php if (isset($_GET['success'])) : ?>
                    <p style="color: green;"><?php echo htmlspecialchars($_GET['success']); ?></p>
                <?php elseif (isset($_GET['error'])) : ?>
                    <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
